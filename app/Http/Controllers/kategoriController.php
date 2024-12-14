<?php

namespace App\Http\Controllers;

use App\Models\KategoriAduan;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    public function index()
    {
        $statuses = KategoriAduan::all();
        return response()->json($statuses);
    }
    public function show($id)
    {
        $status = KategoriAduan::find($id);
        if (!$status) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($status);
    }
}
