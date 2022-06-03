<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPaketWisataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_paket_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->string('tujuan');
            $table->json('fasilitas');
            $table->integer('harga');
            $table->string('foto');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_paket_wisata');
    }
}
