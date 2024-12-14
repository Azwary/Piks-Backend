<?php

namespace App\Http\Controllers;

use App\Models\User;

class RoleController extends Controller
{
    public function assignRoles()
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

        return response()->json(['message' => 'Roles assigned successfully.']);
    }
}