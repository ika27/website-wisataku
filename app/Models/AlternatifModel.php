<?php

namespace App\Models;

use CodeIgniter\Model;

class AlternatifModel extends Model
{
    protected $table      = 'tbl_alternatif';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_wisata',
        'nama_wisata',
        'kategori_wisata',
        'deskripsi',
        'gambar',
        'rating'
    ];
}
