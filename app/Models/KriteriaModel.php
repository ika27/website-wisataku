<?php

namespace App\Models;

use CodeIgniter\Model;

class KriteriaModel extends Model
{
    protected $table      = 'tbl_kriteria';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'kode_kriteria',
        'nama_kriteria',
        'kategori_utama',
        'bobot'
    ];
}
