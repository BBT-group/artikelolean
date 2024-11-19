<?php

namespace App\Models;

use CodeIgniter\Model;

class UserManagerModel extends Model
{
    protected $table = 'ms_user_manager';
    protected $primaryKey = 'id_ms_user_manager';

    protected $allowedFields = [
        'username',
        'password',
        'role',
        'nama',
        'aktif',
        'last_login',
        'online'
    ];

    protected $useTimestamps = false;
    protected $returnType = 'array';
    public function getUserById($id)
    {
        return $this->find($id);
    }
}
