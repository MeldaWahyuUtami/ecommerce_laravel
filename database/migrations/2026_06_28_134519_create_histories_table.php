<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();

            // 🔥 FIX: pakai unsignedBigInteger (standar relasi Laravel)
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_product');

            $table->integer('total_harga');

            $table->timestamps();

            // (OPSIONAL TAPI RECOMMENDED)
            // kalau nanti mau relasi aman
            // $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};