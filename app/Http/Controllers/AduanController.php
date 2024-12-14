<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AduanController extends Controller
{
    public function index()
    {
        $aduan = Aduan::all();
        return response()->json($aduan);
    }

    public function show($id)
    {
        $aduan = Aduan::find($id);
        if (!$aduan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($aduan);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
<<<<<<< HEAD
            'nama_pengadu' => 'required|string',
=======
            'pengadu_id' => 'required|exists:users,id',
>>>>>>> fb/main
            'kategori_id' => 'required|exists:kategori_aduans,id',
            'keterangan_aduan' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'titik_lokasi' => 'required|string',
            'deskripsi_lokasi' => 'required|string',
            'status_id' => 'required|exists:statuses,id',
            'dokumentasi_hasil' => 'nullable|string',
<<<<<<< HEAD
            'anonim' => 'nullable|in:0,1',
=======
>>>>>>> fb/main
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 422);
        }

        $aduan = new Aduan();
<<<<<<< HEAD
        $aduan->nama_pengadu = $request->input('nama_pengadu');
=======
        $aduan->pengadu_id = $request->input('pengadu_id');
>>>>>>> fb/main
        $aduan->kategori_id = $request->input('kategori_id');
        $aduan->keterangan_aduan = $request->input('keterangan_aduan');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/foto', $filename);
            $aduan->foto = 'storage/foto/' . $filename;
        }

        $aduan->titik_lokasi = $request->input('titik_lokasi');
        $aduan->deskripsi_lokasi = $request->input('deskripsi_lokasi');
        $aduan->status_id = $request->input('status_id');
        $aduan->dokumentasi_hasil = $request->input('dokumentasi_hasil');
<<<<<<< HEAD
        $aduan->anonim = $request->input('anonim');
=======
>>>>>>> fb/main

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
<<<<<<< HEAD
            'nama_pengadu' => 'sometimes|string',
=======
            'pengadu_id' => 'sometimes|required|exists:users,id',
>>>>>>> fb/main
            'kategori_id' => 'sometimes|required|exists:kategori_aduans,id',
            'keterangan_aduan' => 'sometimes|required|string',
            'foto' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'titik_lokasi' => 'sometimes|required|string',
            'deskripsi_lokasi' => 'sometimes|required|string',
            'status_id' => 'sometimes|required|exists:statuses,id',
            'dokumentasi_hasil' => 'sometimes|nullable|string',
<<<<<<< HEAD
            'anonim' => 'nullable|in:0,1',
=======
>>>>>>> fb/main
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 422);
        }

        // Hapus foto lama jika ada
        if ($aduan->foto && $request->hasFile('foto')) {
            Storage::delete('public/' . str_replace('storage/foto/', '', $aduan->foto));
        }

        // Simpan foto baru jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/foto', $filename);
            $aduan->foto = 'storage/foto/' . $filename;
        }

        // Update data aduan
<<<<<<< HEAD
        $aduan->nama_pengadu = $request->input('nama_pengadu', $aduan->nama_pengadu);
=======
        $aduan->pengadu_id = $request->input('pengadu_id', $aduan->pengadu_id);
>>>>>>> fb/main
        $aduan->kategori_id = $request->input('kategori_id', $aduan->kategori_id);
        $aduan->keterangan_aduan = $request->input('keterangan_aduan', $aduan->keterangan_aduan);
        $aduan->titik_lokasi = $request->input('titik_lokasi', $aduan->titik_lokasi);
        $aduan->deskripsi_lokasi = $request->input('deskripsi_lokasi', $aduan->deskripsi_lokasi);
        $aduan->status_id = $request->input('status_id', $aduan->status_id);
        $aduan->dokumentasi_hasil = $request->input('dokumentasi_hasil', $aduan->dokumentasi_hasil);
<<<<<<< HEAD
        $aduan->anonim = $request->input('anonim', $aduan->anonim);
=======
>>>>>>> fb/main

        $aduan->save();

        return response()->json(['message' => 'Data aduan berhasil diupdate'], 200);
    }

    public function destroy($id)
    {
        $aduan = Aduan::find($id);
        if (!$aduan) {
            return response()->json(['error' => 'Data aduan tidak ditemukan'], 404);
        }

        // Hapus foto jika ada
        if ($aduan->foto) {
            Storage::delete('public/' . $aduan->foto);
        }

        $aduan->delete();
        return response()->json(['message' => 'Data aduan berhasil dihapus'], 200);
    }
}
