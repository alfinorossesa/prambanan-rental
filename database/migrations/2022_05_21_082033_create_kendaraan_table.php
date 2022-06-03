<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('merk_id');
            $table->string('no_polisi');
            $table->string('no_mesin');
            $table->string('no_rangka');
            $table->string('kategori');
            $table->string('tipe');
            $table->integer('kapasitas_penumpang');
            $table->integer('tahun');
            $table->string('warna');
            $table->string('foto');
            $table->string('jenis_bbm');
            $table->integer('kapasitas_bbm');
            $table->timestamps();

            $table->foreign('merk_id')->references('id')->on('merk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kendaraan');
    }
}
