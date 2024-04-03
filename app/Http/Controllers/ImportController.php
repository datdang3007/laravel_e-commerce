<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Import;

class ImportController extends Controller
{
    public function index()
    {
        $imports = Import::all();
        return view('imports.index', compact('imports'));
    }

    public function create()
    {
        return view('imports.create');
    }

    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            // Add validation rules here
        ]);

        // Create new import
        Import::create($request->all());

        return redirect()->route('imports.index')->with('success', 'Import created successfully.');
    }

    public function show($id)
    {
        $import = Import::findOrFail($id);
        return view('imports.show', compact('import'));
    }

    public function edit($id)
    {
        $import = Import::findOrFail($id);
        return view('imports.edit', compact('import'));
    }

    public function update(Request $request, $id)
    {
        // Validate request data
        $request->validate([
            // Add validation rules here
        ]);

        // Update import
        Import::findOrFail($id)->update($request->all());

        return redirect()->route('imports.index')->with('success', 'Import updated successfully.');
    }

    public function destroy($id)
    {
        // Delete import
        Import::findOrFail($id)->delete();

        return redirect()->route('imports.index')->with('success', 'Import deleted successfully.');
    }
}
