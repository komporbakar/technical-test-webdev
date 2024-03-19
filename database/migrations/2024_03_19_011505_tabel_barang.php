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
        Schema::create('tabel_barang', function (Blueprint $table) {
            $table->id();
            $table->string('kd_kategori');
            $table->string('kd_satuan');
            $table->string('kode')->unique();
            $table->string('nama')->unique();
            $table->integer('jumlah')->nullable()->max(100);
            $table->unsignedBigInteger('id_user_insert');
            $table->foreign('id_user_insert')->references('id')->on('users');
            $table->foreign('kd_kategori')->references('kode')->on('tabel_kategori_barang');
            $table->foreign('kd_satuan')->references('kode')->on('tabel_satuan_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
