<?php

namespace App\Utils;

use NlpTools\Tokenizers\WhitespaceTokenizer;

class TfIdfTransformer
{
    private $idf = [];

    public function fit(array $documents)
    {
        $df = [];
        $totalDocuments = count($documents);

        foreach ($documents as $document) {
            // Tokenisasi dokumen jika perlu
            $tokens = is_string($document) ? $this->tokenize($document) : $document;
            $terms = array_unique($tokens);
            foreach ($terms as $term) {
                if (!isset($df[$term])) {
                    $df[$term] = 0;
                }
                $df[$term]++;
            }
        }

        foreach ($df as $term => $count) {
            $this->idf[$term] = log($totalDocuments / $count);
        }
    }

    public function transform(array $documents)
    {
        $tfidfDocuments = [];

        foreach ($documents as $document) {
            // Tokenisasi dokumen jika perlu
            $tokens = is_string($document) ? $this->tokenize($document) : $document;
            $tf = array_count_values($tokens);
            $tfidf = [];
            foreach ($tf as $term => $count) {
                $tfidf[$term] = $count * ($this->idf[$term] ?? 0);
            }
            $tfidfDocuments[] = $tfidf;
        }

        return $tfidfDocuments;
    }

    public function transformSingle(array $document)
    {
        $tf = array_count_values($document);
        $tfidf = [];
        foreach ($tf as $term => $count) {
            $tfidf[$term] = $count * ($this->idf[$term] ?? 0);
        }
        return $tfidf;
    }

    private function tokenize($document)
    {
        // Tokenisasi menggunakan WhitespaceTokenizer
        $tokenizer = new WhitespaceTokenizer();
        return $tokenizer->tokenize($document);
    }
}
