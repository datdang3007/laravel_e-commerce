@extends('layouts.layout_admin')

@section('title', 'Tạo Mới Nhập hàng')

@section('content')
<div class="flex justify-center">
    <div class="w-full">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-4 py-3 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Tạo Mới Nhập hàng</h2>
            </div>
            <div class="p-4">
                <form action="{{ route('imports.store') }}" method="POST" id="importForm">
                    @csrf
                    <div class="mb-4">
                        <label for="supplier_id" class="block text-gray-700 text-sm font-bold mb-2">Nhà cung cấp</label>
                        <select name="supplier_id" id="supplier_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                        @error('supplier_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="import_status_id" class="block text-gray-700 text-sm font-bold mb-2">Trạng thái</label>
                        <select name="import_status_id" id="import_status_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @foreach ($importStatuses as $importStatus)
                                <option value="{{ $importStatus->id }}">{{ $importStatus->name }}</option>
                            @endforeach
                        </select>
                        @error('import_status_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-4 gap-y-4">
                        <div>
                            <table id="detailsTable" class="w-full">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 bg-gray-200 border border-gray-300">Sản phẩm</th>
                                        <th class="py-2 px-4 bg-gray-200 border border-gray-300">Số lượng</th>
                                        <th class="py-2 px-4 bg-gray-200 border border-gray-300">Đơn giá</th>
                                        <th class="py-2 px-4 bg-gray-200 border border-gray-300"></th>
                                    </tr>
                                </thead>
                                <tbody id="detailsTableBody">
                                    <tr id="detailRowTemplate" style="display: none;">
                                        <td class="py-2 px-4 border border-gray-300">
                                            <select name="product_id[]" class="product_id shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="py-2 px-4 border border-gray-300">
                                            <input type="number" name="quantity[]" class="quantity shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        </td>
                                        <td class="py-2 px-4 border border-gray-300">
                                            <input type="number" name="unit_price[]" class="unit_price shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        </td>
                                        <td class="py-2 px-4 border border-gray-300">
                                            <button type="button" class="bg-red-500 text-white px-2 py-1 rounded-md delete-row">Xóa</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <button type="button" class="w-fit bg-blue-500 text-white px-2 py-1 rounded-md" id="addRow">Thêm hàng</button>
                        </div>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Tạo</button>
                        <a href="{{ route('imports.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">Đóng</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        var newRow = $('#detailRowTemplate').clone().removeAttr('id').removeAttr('style');
        $(newRow).appendTo('#detailsTable tbody').show();

        $('#addRow').click(function() {
            var newRow = $('#detailRowTemplate').clone().removeAttr('id').removeAttr('style');
            $(newRow).appendTo('#detailsTable tbody').show();
        });

        $('#detailsTable').on('click', '.delete-row', function() {
            if ($('#detailsTable tbody tr').length > 2) {
                $(this).closest('tr').remove();
            } else {
                alert('Không thể xóa hàng cuối cùng.');
            }
        });
    });
</script>
@endsection
