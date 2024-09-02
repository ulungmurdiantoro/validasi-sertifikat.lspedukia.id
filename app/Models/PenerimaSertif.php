<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaSertif extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama_lengkap',
        'skema',
        'no_skema',
        'no_sertif',
        'nama_gelar',
        'tgl_rilis',
        'tgl_rilis',
    ];
}
