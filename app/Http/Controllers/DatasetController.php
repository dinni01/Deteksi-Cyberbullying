<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use Illuminate\Http\Request;

class DatasetController extends Controller
{
    public function index()
    {
        $datasets = Dataset::paginate(10); // Menggunakan paginate untuk pagination

        return view('datasets.index', compact('datasets'));
    }

    public function create()
    {
        return view('datasets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'admin_id' => 'required|integer',
            'text' => 'required|string',
            'label' => 'required|string',
        ]);

         // Simpan data ke database
         $dataset = new Dataset();
         $dataset->admin_id = $request->admin_id;
         $dataset->text = $request->text;
         $dataset->label = $request->label;
         $dataset->save();

        Dataset::create($request->all());
        return redirect()->route('datasets.index')->with('success', 'Dataset created successfully.');
    }

    public function show($id)
    {
        $dataset = Dataset::findOrFail($id);
        return view('datasets.show', compact('dataset'));
    }

    public function edit($id)
    {
        $dataset = Dataset::findOrFail($id);
        return view('datasets.edit', compact('dataset'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'text' => 'required',
            'label' => 'required|in:Bullying,Non-Bullying',
        ]);

        $dataset = Dataset::findOrFail($id);
        $dataset->update($request->all());
        return redirect()->route('datasets.index')->with('success', 'Dataset updated successfully.');
    }

    public function destroy($id)
    {
        $dataset = Dataset::findOrFail($id);
        $dataset->delete();
        return redirect()->route('datasets.index')->with('success', 'Dataset deleted successfully.');
    }

    
}
