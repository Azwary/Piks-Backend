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
        Schema::create('dokuementasis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_aduan');
            $table->unsignedBigInteger('id_pemerintah');
            $table->string('file_dokumentasi');
            $table->timestamps();

            $table->foreign('id_aduan')->references('id')->on('aduans');
            $table->foreign('id_pemerintah')->references('id')->on('users_pemerintahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokuementasis');
    }
};
