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
        Schema::create('categoryaccessories', function (Blueprint $table) {
            $table->increments('id_accessory');
            $table->string('name');
            $table->text('description');
            $table->boolean('checkstatus')->default(true)->comment('check trạng thái nè');
            $table->unsignedBigInteger('id')->comment('id người dùng nè');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoryaccessories');
    }
};
