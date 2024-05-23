<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id_product');
            $table->string('name');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('discount');
            $table->string('image')->comment('ảnh đại diện sản phẩm');
            $table->json('list_images')->nullable()->comment('Danh sách ảnh nè');
            $table->unsignedBigInteger('id_categories')->comment('danh mục sản phẩm');
            $table->unsignedBigInteger('id_attribute')->comment('thuộc tính');
            $table->unsignedBigInteger('id_typeproduct')->comment('loại sản phẩm nè'); 
            $table->unsignedBigInteger('id_trademark')->comment('thương hiệu nè');
            $table->unsignedBigInteger('quantity')->comment('số lượng');
            $table->string('description')->comment('mô tả ngắn');
            $table->text('content')->comment('mô tả nhiều');
            $table->string('origin')->comment('xuất xứ');
            $table->string('waterresistance')->comment('đô chịu nước');
            $table->unsignedBigInteger('energy')->comment('năng lượng'); 
            $table->unsignedBigInteger('id')->comment('người thêm nè');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
