<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\RiwayatPrediksi;

class KlasifikasiController extends Controller
{
    public function index()
    {
        return view('klasifikasi');
    }

    public function process(Request $request)
    {
        $inputKata = $request->input('kata'); // Mengambil input dari pengguna

        if ($inputKata) {
            // Kirim request ke Flask API
            $response = Http::get('https://ndnftr99.pythonanywhere.com/api?query=', ['query' => $inputKata]);

            // Handle respons dari Flask API
            if ($response->successful()) {
                $data = $response->json();
                $prediction = $data['output'];
                $bullyingProbability = $data['Bullying_probability'];
                $nonBullyingProbability = $data['Non_Bullying_probability'];
                $accuracy = $data['accuracy'];

                // Simpan riwayat prediksi ke dalam database
                $riwayat = new RiwayatPrediksi();
                $riwayat->text = $inputKata;
                $riwayat->hasil_prediksi = $prediction;
                $riwayat->predicted_at = now();
                $riwayat->save();

                // Mengirim data ke view untuk ditampilkan
                return view('klasifikasi', [
                    'input' => $inputKata,
                    'prediction' => $prediction,
                    'bullying_probability' => $bullyingProbability,
                    'non_bullying_probability' => $nonBullyingProbability,
                    'accuracy' => $accuracy,
                ]);
            } else {
                return view('landing_page');
            }
        }

        return view('landing_page');
    }
}
