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
        Schema::create('obat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_seller');
            $table->string('nama_obat');
            $table->string('jenis_obat');
            $table->integer('harga_obat');
            $table->integer('stok_obat');
            $table->string('gambar_obat');
            $table->string('deskripsi_obat');
            $table->timestamps();

            $table->foreign('id_seller')->references('id')->on('seller')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};
