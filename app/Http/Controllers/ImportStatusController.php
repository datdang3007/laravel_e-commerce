<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImportStatus;

class ImportStatusController extends Controller
{
    public function index()
    {
        $importStatuses = ImportStatus::all();
        return view('import_statuses.index', compact('importStatuses'));
    }

    public function create()
    {
        return view('import_statuses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:import_statuses|max:255',
        ]);

        ImportStatus::create($request->all());

        return redirect()->route('import_statuses.index')->with('success', 'Import status created successfully.');
    }

    public function show($id)
    {
        $importStatus = ImportStatus::findOrFail($id);
        return view('import_statuses.show', compact('importStatus'));
    }

    public function edit($id)
    {
        $importStatus = ImportStatus::findOrFail($id);
        return view('import_statuses.edit', compact('importStatus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:import_statuses,name,' . $id,
        ]);

        ImportStatus::findOrFail($id)->update($request->all());

        return redirect()->route('import_statuses.index')->with('success', 'Import status updated successfully.');
    }

    public function destroy($id)
    {
        ImportStatus::findOrFail($id)->delete();
        return redirect()->route('import_statuses.index')->with('success', 'Import status deleted successfully.');
    }
}
