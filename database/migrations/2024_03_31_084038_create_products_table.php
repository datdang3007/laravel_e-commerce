<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('unit'); // Đơn vị (ví dụ: cái, hộp, kg)
            $table->decimal('price', 10, 2); // Giá (có thể sử dụng số thập phân)
            $table->integer('stock_quantity')->unsigned(); // Số lượng tồn kho (kiểu số nguyên)
            $table->unsignedBigInteger('category_id'); // Thêm cột tham chiếu đến bảng categories
            $table->unsignedBigInteger('manufacturer_id'); // Thêm cột tham chiếu đến bảng manufacturers
            $table->dateTime('production_date')->nullable(); // Ngày sản xuất (có thể để null)
            $table->string('production_location')->nullable(); // Nơi sản xuất (có thể để null)
            $table->timestamps();
            
            // Tạo foreign key constraints
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
