<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Import;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\ImportStatus;

class ImportController extends Controller
{
    public function index()
    {
        $imports = Import::all();
        return view('imports.index', compact('imports'));
    }

    public function create()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        $importStatuses = ImportStatus::all();
        return view('imports.create', compact('products', 'suppliers', 'importStatuses'));
    }

    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'import_status_id' => 'required|exists:import_statuses,id',
            'details.*.product_id' => 'required|exists:products,id',
            'details.*.quantity' => 'required|integer|min:1',
            'details.*.unit_price' => 'required|numeric|min:0',
        ]);

        // Create import
        $import = Import::create([
            'supplier_id' => $request->supplier_id,
            'import_status_id' => $request->import_status_id,
        ]);

        // Create import details
        foreach ($request->details as $detail) {
            ImportDetail::create([
                'import_id' => $import->id,
                'product_id' => $detail['product_id'],
                'quantity' => $detail['quantity'],
                'unit_price' => $detail['unit_price'],
            ]);
        }

        return redirect()->route('imports.index')->with('success', 'Import created successfully.');
    }


    public function show($id)
    {
        $import = Import::with('details.product')->findOrFail($id);
        return view('imports.show', compact('import'));
    }

    public function edit($id)
    {
        $import = Import::with('details.product')->findOrFail($id);
        $products = Product::all();
        $suppliers = Supplier::all();
        $importStatuses = ImportStatus::all();
        return view('imports.edit', compact('import', 'products', 'suppliers', 'importStatuses'));
    }

    public function update(Request $request, $id)
    {
        // Validate request data
        $request->validate([
            'status' => 'required|in:pending,processing,completed,canceled',
        ]);

        // Update import status
        $import = Import::findOrFail($id);
        $import->update(['status' => $request->status]);

        return redirect()->route('imports.index')->with('success', 'Import status updated successfully.');
    }


    public function destroy($id)
    {
        // Delete import
        Import::findOrFail($id)->delete();

        return redirect()->route('imports.index')->with('success', 'Import deleted successfully.');
    }
}
