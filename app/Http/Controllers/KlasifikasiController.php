<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use NlpTools\Tokenizers\WhitespaceTokenizer;
use NlpTools\Models\FeatureBasedNB;
use NlpTools\Documents\TrainingSet;
use NlpTools\Documents\TokensDocument;
use NlpTools\FeatureFactories\DataAsFeatures;
use NlpTools\Classifiers\MultinomialNBClassifier;
use Sastrawi\Stemmer\StemmerFactory;
use Sastrawi\Dictionary\ArrayDictionary;
use Sastrawi\Stemmer\Stemmer;
use App\Models\RiwayatPrediksi;




class KlasifikasiController extends Controller
{
    private $accuracy; // Properti untuk menyimpan nilai akurasi

    // Menampilkan halaman klasifikasi
    public function index()
    {
        return view('klasifikasi');
    }
    

    // Memproses input dari pengguna
    public function process(Request $request)
    {
        $inputKata = $request->input('kata'); // Mengambil input dari pengguna

        if ($inputKata) {
            $hasil_preprocessing = $this->preprocess($inputKata); // Melakukan preprocessing pada input
            $prediction = $this->classify($hasil_preprocessing['stemmed']); // Melakukan klasifikasi pada hasil preprocessing
            $accuracy = $this->getAccuracy(); // Mengambil nilai akurasi model


             // Simpan riwayat prediksi ke dalam database
             $riwayat = new RiwayatPrediksi();
             $riwayat->text = $inputKata;
             $riwayat->hasil_prediksi = $prediction;
             $riwayat->predicted_at = now(); // Waktu prediksi saat ini
             $riwayat->save();



            // Mengirim data ke view untuk ditampilkan
            return view('klasifikasi', [
                'input' => $inputKata,
                'hasil' => $hasil_preprocessing,
                'prediction' => $prediction,
                'accuracy' => $accuracy
            ]);
        }

        return view('landing_page');
    }

    // Melakukan preprocessing pada input
    private function preprocess($input)
    {
        $caseFolded = strtolower($input); // Mengubah teks menjadi huruf kecil
        $tokenizer = new WhitespaceTokenizer();
        $tokens = $tokenizer->tokenize($caseFolded); // Melakukan tokenisasi

        // Daftar stopwords untuk dihapus
        $stopwords = [
            '/\b\d+\b/', // Angka dengan lebih dari satu digit
            '/\b\d\b/', // Angka satu digit
            '/[^a-z\s]/i', // Karakter non-alfabet
            '/\b(?:ke|di|dan|atau|yang|dari|dengan|si|ini|itu|adalah|lah|jung|hwan|kaka|deh|cuyy|sgt|meldi|marcelino|sih|n|adi|gua|lo|eh|cipp|se)\b/i' // Stopwords umum
        ];
        $filteredTokens = preg_replace($stopwords, '', $tokens); // Menghapus stopwords
        $filteredTokens = array_filter($filteredTokens); // Menghapus elemen kosong

        // Membuat stemmer
        $stemmerFactory = new StemmerFactory();
        $stemmer = $stemmerFactory->createStemmer();
        $dictionary = new ArrayDictionary();
        $filePath = storage_path('app/kata-dasar.txt');

        // Memuat kata dasar ke dalam kamus
        if (file_exists($filePath)) {
            $words = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($words as $word) {
                $dictionary->add($word);
            }
            $stemmer = new Stemmer($dictionary);
        } else {
            return "File kata dasar tidak ditemukan.";
        }

        // Melakukan stemming pada token yang telah difilter
        $stemmedTokens = [];
        foreach ($filteredTokens as $token) {
            $stemmedTokens[] = $stemmer->stem($token);
        }

        $stemmed = implode(' ', $stemmedTokens); // Menggabungkan token yang telah di-stem

        return [
            'case_folded' => $caseFolded,
            'tokenized' => $tokens,
            'filtered' => $filteredTokens,
            'stemmed' => $stemmed
        ]; // Mengembalikan hasil preprocessing
    }

    // Melakukan klasifikasi pada input
    private function classify($input)
    {
        $csvFile = storage_path('app/Dataset_percobaan.csv');
        $modelPath = storage_path('app/model2.ser');

        list($trainingSet, $testingSet) = $this->splitDataset($csvFile, 0.8); // Memisahkan dataset menjadi training dan testing set

        // Memuat atau melatih model jika belum ada
        $model = $this->loadModel($modelPath);
        if (!$model) {
            list($trainingSet, $testingSet) = $this->splitDataset($csvFile, 0.8); // Memisahkan dataset menjadi training dan testing set
            $model = $this->trainAndSaveModel($trainingSet, $testingSet, $modelPath); // Melatih model dan menyimpannya
        }

        $model = $this->trainModel($trainingSet); // Melatih model dengan training set

        $this->testModel($model, $testingSet); // Menguji model untuk mendapatkan akurasi
        // print_r($model);
        
        

        // Melakukan klasifikasi pada input pengguna
        $tok = new WhitespaceTokenizer();
        $ff = new DataAsFeatures();
        $cls = new MultinomialNBClassifier($ff, $model);
        //  print_r($tok->tokenize($input));   //ditambahkan bapak nanang
        $prediction = $cls->classify(
            ['Bullying', 'Non-Bullying'],
            new TokensDocument(
                $tok->tokenize($input)
            )
        );

        // Tetapkan label berdasarkan hasil prediksi
        $label = ($prediction === 'Bullying') ? 'Bullying' : 'Non-Bullying';

        return $prediction; // Mengembalikan label hasil prediksi
    }

    // Memisahkan dataset menjadi training dan testing set
    private function splitDataset($csvFile, $trainRatio)
    {
        $data = $this->readCSV($csvFile);
        srand(123); // Mengatur seed untuk pengacakan yang konsisten
        shuffle($data); // Mengacak data

        $splitIndex = (int) (count($data) * $trainRatio); // Menentukan indeks pemisahan
        $trainingSet = array_slice($data, 0, $splitIndex); // Mengambil bagian training set
        $testingSet = array_slice($data, $splitIndex); // Mengambil bagian testing set

        return [$trainingSet, $testingSet]; // Mengembalikan training dan testing set
    }

    // Melatih model dengan training set dan menyimpannya
    private function trainAndSaveModel($trainingSet, $testingSet, $modelPath)
    {
        $model = $this->trainModel($trainingSet); // Melatih model dengan training set
        $this->testModel($model, $testingSet); // Menguji model dengan testing set dan menyimpan akurasinya

        // Simpan model ke file
        file_put_contents($modelPath, serialize($model));

        return $model; // Mengembalikan model yang telah dilatih
    }

    // Melatih model dengan training set
    private function trainModel($data)
    {
        $tset = new TrainingSet();
        $tok = new WhitespaceTokenizer();
        $ff = new DataAsFeatures();

        $stopwords = [
            '/\b\d+\b/', // Angka dengan lebih dari satu digit
            '/\b\d\b/', // Angka satu digit
            '/[^a-z\s]/i', // Karakter non-alfabet
            '/\b(?:ke|di|dan|atau|yang|dari|dengan|si|ini|itu)\b/i' // Stopwords umum
        ];

        // Membuat stemmer
        $stemmerFactory = new StemmerFactory();
        $stemmer = $stemmerFactory->createStemmer();
        $dictionary = new ArrayDictionary();
        $filePath = storage_path('app/kata-dasar.txt');

        // Memuat kata dasar ke dalam kamus
        if (file_exists($filePath)) {
            $words = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($words as $word) {
                $dictionary->add($word);
            }
            $stemmer = new Stemmer($dictionary);
        } else {
            return "File kata dasar tidak ditemukan.";
        }

        foreach ($data as $d) {
            $a = strtolower($d[1]);
            $tokens = $tok->tokenize($a); // Tokenisasi teks
            
            // Melakukan preprocessing (penghapusan stopwords dan stemming)
            $filteredTokens = preg_replace($stopwords, '', $tokens); // Menghapus stopwords
            $filteredTokens = array_filter($filteredTokens); // Menghapus elemen kosong
            
            $stemmedTokens = [];
            foreach ($filteredTokens as $token) {
                $stemmedTokens[] = $stemmer->stem($token); // Melakukan stemming
            }
    
            $stemmed = implode(' ', $stemmedTokens); // Menggabungkan token yang telah di-stem

            $tset->addDocument(
                $d[0], // Kelas
                new TokensDocument(
                    $tok->tokenize($stemmed) // Teks
                )
            );
        }

        $model = new FeatureBasedNB();
        $model->train($ff, $tset); // Melatih model

        return $model; // Mengembalikan model yang telah dilatih
    }

    // Memuat model dari file jika ada
    private function loadModel($modelPath)
    {
        if (file_exists($modelPath)) {
            return unserialize(file_get_contents($modelPath));
        }
        return null;
    }
    // Menguji model untuk mendapatkan akurasi
    private function testModel($model, $data)
    {
        $tok = new WhitespaceTokenizer();
        $ff = new DataAsFeatures();
        $cls = new MultinomialNBClassifier($ff, $model);

        $correct = 0;
        $total = count($data);

        foreach ($data as $d) {
            $prediction = $cls->classify(
                ['Bullying', 'Non-Bullying'],
                new TokensDocument(
                    $tok->tokenize(strtolower($d[1]))
                )
            );

            if ($prediction == $d[0]) {
                $correct++; // Menambah jumlah prediksi yang benar
            }
        }

        $accuracy = $correct / $total; // Menghitung akurasi
        $this->accuracy = $accuracy; // Menyimpan akurasi dalam properti
    }

    // Mengambil nilai akurasi model
    private function getAccuracy()
    {
        return $this->accuracy ?? 0; // Mengembalikan akurasi yang telah dihitung atau 0 jika belum ada
    }

    // Membaca dataset dari file CSV
    private function readCSV($csvFile, $delimiter = ',')
    {
        $file_handle = fopen($csvFile, 'r');
        $line_of_text = [];
        while ($csvRow = fgetcsv($file_handle, null, $delimiter)) {
            $line_of_text[] = [$csvRow[1], $csvRow[0]]; // Format: [kelas, teks]
        }
        fclose($file_handle);
        return $line_of_text; // Mengembalikan data yang telah dibaca
    }
}

