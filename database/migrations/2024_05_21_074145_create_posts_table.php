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
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id_post');
            $table->string('name');
            $table->text('description');
            $table->text('content')->nullable();
            $table->string('image');
            $table->unsignedBigInteger('id_categorypost');
            $table->unsignedBigInteger('id')->comment('id người dùng nè');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};