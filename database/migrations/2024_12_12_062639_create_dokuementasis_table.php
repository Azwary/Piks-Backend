<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedBigInteger('id_user');
            $table->string('file_dokumentasi');
            $table->timestamps();

            $table->foreign('id_aduan')->references('id')->on('aduans');
            $table->foreign('id_user')->references('id')->on('id_user');
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
