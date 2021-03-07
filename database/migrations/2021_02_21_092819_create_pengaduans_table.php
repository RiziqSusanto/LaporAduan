<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('masyarakat_nik');
            $table->date('tanggal_pengaduan');
            $table->longText('isi_laporan');
            $table->string('foto');
            $table->enum('status', ['Pending', 'Proses', 'Selesai'])->default('Pending');
            $table->timestamps();
        });
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->foreign('masyarakat_nik')->references('nik')->on('masyarakats')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduans');
    }
}
