<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    protected $table = 'aduans';

    protected $fillable = [
<<<<<<< HEAD
        'nama_pengadu',
=======
        'pengadu_id',
>>>>>>> fb/main
        'kategori_id',
        'keterangan_aduan',
        'foto',
        'titik_lokasi',
        'deskripsi_lokasi',
        'status_id',
        'dokumentasi_hasil',
<<<<<<< HEAD
        'anonim',
    ];

=======
    ];

    public function pengadu()
    {
        return $this->belongsTo(User::class, 'pengadu_id')->nullable();
    }
>>>>>>> fb/main
}
