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
        Schema::create('oders', function (Blueprint $table) {
            $table->increments('id_oder');
            $table->string('odercode')->comment('mã đặt hàng');
            $table->unsignedBigInteger('id_customer')->comment('id người dùng');
            $table->unsignedBigInteger('id_transport')->comment('mã nhà vận chuyển');
            $table->string('checkstatus')->default("Đã tiếp nhận");
            $table->unsignedBigInteger("intomoney")->comment('tổng tiền');
            $table->unsignedBigInteger('qty')->comment('số lượng');
            $table->unsignedBigInteger('id_pay')->comment('phương thức thanh toán');
            $table->string('email')->nullable();
            $table->string('name')->comment('tên khách hàng');
            $table->string('district')->comment('quận');
            $table->string('phone');
            $table->unsignedBigInteger('id_product');
            $table->string('detailedaddress')->comment('chi tiết địa chỉ');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oders');
    }
};
