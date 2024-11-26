<?php

namespace App\Models;

use CodeIgniter\Model;

class LinkModel extends Model
{
    protected $table = 'ms_link';
    protected $primaryKey = 'id_ms_link';
    protected $allowedFields = ['nama_link', 'isi_link', 'aktif'];

    public function getFooterbyid($id){
        return $this->where('id_ms_link', $id)->first();
    }
}
