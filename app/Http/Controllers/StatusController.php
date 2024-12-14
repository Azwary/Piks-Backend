<?php

namespace App\Http\Controllers;

use App\Models\status;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = status::all();
        return response()->json($statuses);
    }
    public function show($id)
    {
        $status = Status::find($id);
        if (!$status) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($status);
    }
    
}
