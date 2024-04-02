<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;

class ManufacturerController extends Controller
{
    /**
     * Hiển thị danh sách tất cả nhà sản xuất.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $manufacturers = Manufacturer::all();

        if ($request->wantsJson()) {
            return response()->json($manufacturers);
        }

        return view('manufacturers.index', compact('manufacturers'));
    }

    /**
     * Hiển thị form tạo mới nhà sản xuất.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manufacturers.create');
    }

    /**
     * Lưu một nhà sản xuất mới vào cơ sở dữ liệu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
        ], [
            'name.required' => 'The name field is required.',
            'address.required' => 'The address field is required.',
        ]);

        // Create a new manufacturer
        $manufacturer = new Manufacturer();
        $manufacturer->name = $request->name;
        $manufacturer->address = $request->address;
        $manufacturer->website = $request->website;
        $manufacturer->save();

        // Redirect to index page
        return redirect()->route('manufacturers.index')->with('success', 'Manufacturer created successfully.');
    }

    /**
     * Hiển thị thông tin chi tiết của một nhà sản xuất.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manufacturer = Manufacturer::find($id);
        return view('manufacturers.show', compact('manufacturer'));
    }

    /**
     * Hiển thị form chỉnh sửa nhà sản xuất.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manufacturer = Manufacturer::find($id);
        return view('manufacturers.edit', compact('manufacturer'));
    }

    /**
     * Cập nhật thông tin của một nhà sản xuất trong cơ sở dữ liệu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
        ]);

        // Find the manufacturer
        $manufacturer = Manufacturer::findOrFail($id);

        // Update manufacturer
        $manufacturer->name = $request->name;
        $manufacturer->address = $request->address;
        $manufacturer->website = $request->website;
        $manufacturer->save();

        // Redirect back to list page
        return redirect()->route('manufacturers.index')->with('success', 'Manufacturer updated successfully');
    }

    /**
     * Xóa một nhà sản xuất khỏi cơ sở dữ liệu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Manufacturer::find($id)->delete();

        return redirect()->route('manufacturers.index')
                         ->with('success','Manufacturer deleted successfully');
    }
}
