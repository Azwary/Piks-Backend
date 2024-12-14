<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aduans', function (Blueprint $table) {
            $table->id();
            $table->string('aduan_id')->uniqid;
            $table->string('nama_pengadu');
            $table->unsignedBigInteger('kategori_id');
            $table->string('keterangan_aduan');
            $table->string('foto');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->text('deskripsi_lokasi');
            $table->unsignedBigInteger('status_id')->nullable()->default(1);;
            $table->string('dokumentasi_hasil')->nullable();
            $table->timestamps();

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
