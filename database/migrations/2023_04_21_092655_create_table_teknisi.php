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
        Schema::create('table_teknisi', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 10)->required();
            $table->string('name', 100)->required();
            $table->string('wo')->required();
            $table->string('spbu', 10)->required();
            $table->string('alamat_spbu')->required();
            $table->date('tanggal_laporan')->required();
            $table->string('keterangan')->required();
            $table->string('eviden_laporan');
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
        Schema::dropIfExists('table_teknisi');
    }
};
