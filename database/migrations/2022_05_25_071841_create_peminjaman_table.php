<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kendaraan_id');
            $table->string('kode_reservasi')->unique();
            $table->date('tanggal_pemesanan');
            $table->date('tanggal_peminjaman');
            $table->time('jam_peminjaman');
            $table->string('kartu_identitas');
            $table->string('nik');
            $table->string('jaminan');
            $table->boolean('supir')->nullable();
            $table->boolean('bbm');
            $table->integer('durasi_peminjaman');
            $table->timestamps();

            $table->foreign('kendaraan_id')->references('id')->on('kendaraan')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}
