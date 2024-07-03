<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model;
use App\Models\Admin;

class ModelController extends Controller
{
    public function index()
    {
        $models = Model::all();
        return view('models.index', compact('models'));
    }

    public function create()
    {
        $admins = Admin::all(); // Ambil semua admin dari database
        return view('models.create', compact('admins'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'admin_id' => 'required|integer|exists:admins,id',
            'file_name' => 'required|string',
            'file_path' => 'required|string',
        ]);

        // Simpan model baru ke dalam database
        Model::create([
            'admin_id' => $request->admin_id,
            'file_name' => $request->file_name,
            'file_path' => $request->file_path,
        ]);

        return redirect()->route('models.index')
            ->with('success', 'Model created successfully.');
    }


    public function destroy($id)
    {
        // Hapus model dari database
        Model::findOrFail($id)->delete();

        return redirect()->route('models.index')
            ->with('success', 'Model deleted successfully.');
    }

}
