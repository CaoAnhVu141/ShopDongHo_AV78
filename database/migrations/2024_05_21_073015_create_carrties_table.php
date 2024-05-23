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
        Schema::create('carrties', function (Blueprint $table) {
            $table->increments('id_carrties');
            $table->string('name');
            $table->unsignedBigInteger('averagetime')->comment('thời gian giao hàng trung bình');
            $table->unsignedBigInteger('averagemoney')->comment('chi phí trung bình');
            $table->boolean('checkactive')->default(true)->comment('check hoạt động nè');
            $table->unsignedBigInteger('id')->comment('id người thêm nè');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrties');
    }
};
