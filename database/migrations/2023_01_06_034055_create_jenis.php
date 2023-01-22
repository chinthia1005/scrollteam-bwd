<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jeniss', function (Blueprint $table) {
            $table->id();
            $table->string('Jenis_Handphone');
            $table->string('Fitur');
            $table->string('Type');
            $table->string('Harga');
            $table->string('Kapasitas_Memory');
            $table->string('Tahun_Rilis');
            $table->string('Foto');
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
        Schema::dropIfExists('jenis');
    }
};
