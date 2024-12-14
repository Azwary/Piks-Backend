<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    protected $table = 'aduans';

    protected $fillable = [
        'nama_pengadu',
        'kategori_id',
        'keterangan_aduan',
        'foto',
        'titik_lokasi',
        'deskripsi_lokasi',
        'status_id',
        'dokumentasi_hasil',
        'anonim',
    ];

}
