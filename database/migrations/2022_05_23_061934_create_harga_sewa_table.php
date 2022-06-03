<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHargaSewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harga_sewa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kendaraan_id');
            $table->integer('harga');
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('kendaraan_id')->references('id')->on('kendaraan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('harga_sewa');
    }
}
