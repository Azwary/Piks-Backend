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
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->timestamps();
        });
        $statuses = [
<<<<<<< HEAD
            ['status' => 'Belum Diproses'],
<<<<<<< HEAD
            ['status' => 'Aduan Diproses'],
            ['status' => 'Aduan Ditolak'],
            ['status' => 'Aduan Selesai'],
=======
=======
            ['status' => 'Belum Ditangani'],
>>>>>>> fb/main
            ['status' => 'Sedang Ditangani'],
            ['status' => 'Telah Ditangani'],
>>>>>>> 0fc0f24182e5a47b055a9a4519b65d784ea1ad31
        ];
        DB::table('statuses')->insert($statuses);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuses');
    }
};
