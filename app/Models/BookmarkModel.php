<?php

namespace App\Models;

use CodeIgniter\Model;

class BookmarkModel extends Model
{
    protected $table = 'tbl_bookmark';
    protected $primaryKey = 'id_bookmark';
    protected $allowedFields = ['id_user', 'id_wisata', 'created_at'];
    public $timestamps = false;
}
