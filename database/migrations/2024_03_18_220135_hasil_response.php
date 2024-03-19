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
        Schema::create('tabel_hasil_response', function (Blueprint $table) {
            $table->id();
            $table->integer('jeniskelamin');
            $table->foreign('jeniskelamin')->references('kode')->on('tabel_jeniskelamin');
            $table->string('nama');
            $table->string('nama_jalan');
            $table->string('email');
            $table->integer('angka_kurang');
            $table->integer('angka_lebih');
            $table->string('profesi');
            $table->foreign('profesi')->references('kode')->on('tabel_profesi');
            $table->text('plain_json');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_hasil_response');
    }
};
