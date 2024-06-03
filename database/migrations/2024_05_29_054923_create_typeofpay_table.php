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
        Schema::create('typeofpay', function (Blueprint $table) {
            $table->increments('id_pay');
            $table->string('name');
            $table->text('description');
            $table->string('icon');
            $table->boolean('checkactive')->default(true)->comment("hoạt động");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('typeofpay');
    }
};
