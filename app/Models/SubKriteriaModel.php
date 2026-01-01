<?php

namespace App\Models;

use CodeIgniter\Model;

class SubKriteriaModel extends Model
{
    protected $table      = 'tbl_sub_kriteria';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'kode_kriteria',
        'type',
        'sub_kriteria',
        'nilai'
    ];
}
