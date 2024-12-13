<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kategori_aduans', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->timestamps();
        });
        $kategori_aduans = [
            ['kategori' => 'Bencana alam'],
            ['kategori' => 'infrastruktur'],
        ];
        DB::table('kategori_aduans')->insert($kategori_aduans);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_aduans');
    }
};
