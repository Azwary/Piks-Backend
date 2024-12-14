<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Assign role to a user.
     */
    public function assignRoles(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|exists:users,id', // ID pengguna harus valid
            'role' => 'required|integer|in:1,2', // Role hanya boleh 1 (Pemerintah) atau 2 (Pengelola)
        ]);

        // Cek jika user_id adalah 1 atau 2
        if ($request->user_id == 1) {
            return response()->json([
                'message' => 'User with ID 1 is always Pengelola and cannot be changed.'
            ], 403);
        }

        if ($request->user_id == 2) {
            return response()->json([
                'message' => 'User with ID 2 is always Pemerintah and cannot be changed.'
            ], 403);
        }

        // Cari pengguna berdasarkan ID
        $user = User::find($request->user_id);

        // Update role pengguna
        $user->role = $request->role;
        $user->save();

        return response()->json([
            'message' => 'Role assigned successfully',
            'user' => $user,
        ], 200);
    }
}
