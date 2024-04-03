<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImportDetail;

class ImportDetailController extends Controller
{
    public function index()
    {
        $importDetails = ImportDetail::all();
        return view('import_details.index', compact('importDetails'));
    }

    public function create()
    {
        return view('import_details.create');
    }

    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            // Add validation rules here
        ]);

        // Create new import detail
        ImportDetail::create($request->all());

        return redirect()->route('import_details.index')->with('success', 'Import detail created successfully.');
    }

    public function show($id)
    {
        $importDetail = ImportDetail::findOrFail($id);
        return view('import_details.show', compact('importDetail'));
    }

    public function edit($id)
    {
        $importDetail = ImportDetail::findOrFail($id);
        return view('import_details.edit', compact('importDetail'));
    }

    public function update(Request $request, $id)
    {
        // Validate request data
        $request->validate([
            // Add validation rules here
        ]);

        // Update import detail
        ImportDetail::findOrFail($id)->update($request->all());

        return redirect()->route('import_details.index')->with('success', 'Import detail updated successfully.');
    }

    public function destroy($id)
    {
        // Delete import detail
        ImportDetail::findOrFail($id)->delete();

        return redirect()->route('import_details.index')->with('success', 'Import detail deleted successfully.');
    }
}
