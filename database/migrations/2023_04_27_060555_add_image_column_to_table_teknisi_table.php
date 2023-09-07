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
        Schema::table('table_teknisi', function (Blueprint $table) {
            $table->string('image', 255)->nullable()->after('tanggal_laporan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_teknisi', function (Blueprint $table) {
            if (Schema::hasColumn('table_teknisi', 'image')) {
                $table->dropColumn('image');
            }
        });
    }
};
