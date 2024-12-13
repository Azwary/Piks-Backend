<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriAduan extends Model
{
    protected $table = 'kategori_aduans';

    protected $fillable = [
        'kategori',
    ];
}
