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
        Schema::create('aduans', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->unsignedBigInteger('nama_pengadu');
=======
            $table->unsignedBigInteger('pengadu_id');
>>>>>>> fb/main
            $table->unsignedBigInteger('kategori_id');
            $table->string('keterangan_aduan');
            $table->string('foto');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->text('deskripsi_lokasi');
            $table->unsignedBigInteger('status_id');
            $table->string('dokumentasi_hasil');
<<<<<<< HEAD
            $table->enum('anonim', ['0', '1']);
            $table->timestamps();

=======
            $table->timestamps();


            $table->foreign('pengadu_id')->references('id')->on('users');
>>>>>>> fb/main
            $table->foreign('kategori_id')->references('id')->on('kategori_aduans');
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aduans');
    }
};
