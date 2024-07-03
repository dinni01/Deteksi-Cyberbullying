<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPrediksi;
use Illuminate\Support\Facades\Log;

class RiwayatDeteksiController extends Controller
{
    public function index()
    {
        Log::info('Memanggil method index() pada RiwayatDeteksiController');

        $riwayat_prediksis = RiwayatPrediksi::all();
        return view('riwayatdeteksi.index', compact('riwayat_prediksis'));
    }

    public function destroy($id)
    {
        Log::info('Memanggil method destroy() pada RiwayatDeteksiController', ['id' => $id]);

        $riwayat_prediksi = RiwayatPrediksi::findOrFail($id);
        $riwayat_prediksi->delete();

        return redirect()->route('riwayatdeteksi.index')->with('success', 'Riwayat prediksi berhasil dihapus.');
    }
}
