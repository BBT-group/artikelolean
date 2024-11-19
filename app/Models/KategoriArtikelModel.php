<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriArtikelModel extends Model
{
    protected $table = 'ms_kategori_artikel';
    protected $primaryKey = 'id_ms_kategori_artikel';
    protected $allowedFields = ['nama_kategori', 'aktif'];
}
