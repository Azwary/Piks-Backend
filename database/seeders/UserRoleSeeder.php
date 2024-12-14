<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        // Assign Pemerintah role
        $pemerintah = User::find(1); // Replace with actual user ID
        if ($pemerintah) {
            $pemerintah->role = User::ROLE_PEMERINTAH;
            $pemerintah->save();
        }

        // Assign Pengelola role
        $pengelola = User::find(2); // Replace with actual user ID
        if ($pengelola) {
            $pengelola->role = User::ROLE_PENGELOLA;
            $pengelola->save();
        }
    }
}
