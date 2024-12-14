<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PengelolaController extends Controller
{
    /**
     * Tambahkan pengguna Pemerintah.
     */
    public function addPemerintah(Request $request)
    {
        // Cek apakah pengguna yang login adalah Pengelola
        if (auth()->user()->role != User::ROLE_PENGELOLA) {
            return response()->json(['message' => 'Unauthorized. Only Pengelola can add Pemerintah users.'], 403);
        }

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Buat akun Pemerintah
        $pemerintah = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => User::ROLE_PEMERINTAH, // Role 2 untuk Pemerintah
        ]);

        return response()->json([
            'message' => 'Pemerintah user added successfully',
            'user' => $pemerintah,
        ], 201);
    }
}
