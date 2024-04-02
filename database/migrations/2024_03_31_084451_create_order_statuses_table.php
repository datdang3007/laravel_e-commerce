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
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên trạng thái (ví dụ: pending, confirmed, shipped, delivered)
            $table->timestamps();
        });

        // Insert default order statuses
        DB::table('order_statuses')->insert([
            ['name' => 'pending'],
            ['name' => 'confirmed'],
            ['name' => 'shipped'],
            ['name' => 'delivered']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_statuses');
    }
};
