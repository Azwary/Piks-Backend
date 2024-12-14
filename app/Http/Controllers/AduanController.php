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
        return response()->json($aduan);
    }

    public function show($id)
    {
        $aduan = Aduan::find($id);

        if (!$aduan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }else if ($aduan->status_id == 2 && 4) {
            return response()->json($aduan);
        }else if ($aduan->status_id == 1) {
            return response()->json(['message' => 'Aduan anda belum diproses'], 200);
        } else if ($aduan->status_id == 3) {
            return response()->json(['message' => 'Aduan ditolak'], 422);
        }
        return response()->json(['message' => 'Ulangi'], 404);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pengadu' => 'required|string',
            'aduan_id' => 'string',
            'kategori_id' => 'required|exists:kategori_aduans,id',
            'keterangan_aduan' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'deskripsi_lokasi' => 'required|string',
            'status_id' => 'exists:statuses,id',
            'dokumentasi_hasil' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 422);
        }

        $aduan = new Aduan();
        $aduan->nama_pengadu = $request->input('nama_pengadu');
        $aduan->aduan_id = Str::random(10);
        $aduan->kategori_id = $request->input('kategori_id');
        $aduan->keterangan_aduan = $request->input('keterangan_aduan');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/foto', $filename);
            $aduan->foto = 'storage/foto/' . $filename;
        }

        $aduan->kecamatan = $request->input('kecamatan');
        $aduan->kelurahan = $request->input('kelurahan');
        $aduan->deskripsi_lokasi = $request->input('deskripsi_lokasi');
        $aduan->status_id = $request->input('status_id');
        $aduan->dokumentasi_hasil = $request->input('dokumentasi_hasil');

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
            'aduan_id' => 'sometimes|required|string',
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
        $aduan->nama_pengadu = $request->input('nama_pengadu', $aduan->nama_pengadu);
        $aduan->kategori_id = $request->input('kategori_id', $aduan->kategori_id);
        $aduan->keterangan_aduan = $request->input('keterangan_aduan', $aduan->keterangan_aduan);
        $aduan->kecamatan = $request->input('kecamatan', $aduan->kecamatan);
        $aduan->kelurahan = $request->input('kelurahan', $aduan->kelurahan);
        $aduan->deskripsi_lokasi = $request->input('deskripsi_lokasi', $aduan->deskripsi_lokasi);
        $aduan->status_id = $request->input('status_id', $aduan->status_id);
        $aduan->dokumentasi_hasil = $request->input('dokumentasi_hasil', $aduan->dokumentasi_hasil);

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


    public function cari(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'aduan_id' => 'required',
        ]);

        $aduan_1 =  $request->input('aduan_id');
        $aduan = Aduan::where('aduan_id', $aduan_1)->first();
        if (!$aduan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($aduan, 200);
    }
}
