<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AduanController extends Controller
{
    public function index()
    {
        $aduan = Aduan::all();

        if ($aduan->isEmpty()) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($aduan, 200);
    }

    public function show($id)
    {
        $aduan = Aduan::find($id);

        if (!$aduan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        switch ($aduan->status_id) {
            case 1:
                return response()->json(['message' => 'Aduan Anda belum diproses'], 200);
            case 3:
                return response()->json(['message' => 'Aduan ditolak'], 422);
            case 2:
            case 4:
                return response()->json($aduan, 200);
            default:
                return response()->json(['message' => 'Status tidak dikenali'], 400);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pengadu' => 'required|string',
            'kategori_id' => 'required|exists:kategori_aduans,id',
            'keterangan_aduan' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'deskripsi_lokasi' => 'required|string',
            'status_id' => 'nullable|exists:statuses,id',
            'dokumentasi_hasil' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 422);
        }

        $aduan = new Aduan();
        $aduan->fill($request->except(['foto']));
        $aduan->aduan_id = Str::random(10);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/foto', $filename);
            $aduan->foto = Storage::url($path);
        }

        $aduan->save();

        return response()->json(['message' => 'Data aduan berhasil disimpan'], 201);
    }

    public function update(Request $request, $id)
    {
        $aduan = Aduan::find($id);

        if (!$aduan) {
            return response()->json(['error' => 'Data aduan tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama_pengadu' => 'sometimes|required|string',
            'kategori_id' => 'sometimes|required|exists:kategori_aduans,id',
            'keterangan_aduan' => 'sometimes|required|string',
            'foto' => 'sometimes|nullable|image|mimes:jpeg,png,jpg|max:2048',
            'kecamatan' => 'sometimes|required|string',
            'kelurahan' => 'sometimes|required|string',
            'deskripsi_lokasi' => 'sometimes|required|string',
            'status_id' => 'sometimes|required|exists:statuses,id',
            'dokumentasi_hasil' => 'sometimes|nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 422);
        }

        if ($request->hasFile('foto')) {
            if ($aduan->foto) {
                Storage::delete('public/foto/' . basename($aduan->foto));
            }
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/foto', $filename);
            $aduan->foto = Storage::url($path);
        }

        $aduan->fill($request->except(['foto']));
        $aduan->save();

        return response()->json(['message' => 'Data aduan berhasil diupdate'], 200);
    }

    public function destroy($id)
    {
        $aduan = Aduan::find($id);

        if (!$aduan) {
            return response()->json(['error' => 'Data aduan tidak ditemukan'], 404);
        }

        if ($aduan->foto) {
            Storage::delete('public/foto/' . basename($aduan->foto));
        }

        $aduan->delete();

        return response()->json(['message' => 'Data aduan berhasil dihapus'], 200);
    }

    public function cari(Request $request)
    {
        $request->validate([
            'aduan_id' => 'required|string|max:255',
        ]);

        $aduan = Aduan::where('aduan_id', $request->input('aduan_id'))
            ->select('id', 'aduan_id', 'judul', 'deskripsi', 'status')
            ->first();

        if (!$aduan) {
            return redirect()->route('aduan.index')
                ->with('error', 'Data tidak diaaatemukan');
        }


        return response()->json($aduan, 200);
        // return redirect()->route('aduan.index')
        //     ->with('success', 'Data ditemukan')
        //     ->with('aduan', $aduan);
    }
}
