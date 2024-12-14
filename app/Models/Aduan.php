<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    protected $table = 'aduans';

    protected $fillable = [
        'pengadu_id',
        'kategori_id',
        'keterangan_aduan',
        'foto',
        'titik_lokasi',
        'deskripsi_lokasi',
        'status_id',
        'dokumentasi_hasil',
    ];

    public function pengadu()
    {
        return $this->belongsTo(User::class, 'pengadu_id')->nullable();
    }
}
