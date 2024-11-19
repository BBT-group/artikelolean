<?php

namespace App\Models;

use CodeIgniter\Model;

class CounterModel extends Model
{
    protected $table = 'counter';
    protected $primaryKey = 'id_counter';
    protected $allowedFields = ['jumlah', 'tanggal'];
    public function getTodayVisitor()
    {
        date_default_timezone_set('Asia/Jakarta');
        $today = date('Y-m-d');
        return $this->where('tanggal', $today)->first();
    }
    public function getDailyVisitors()
    {
        return $this->orderBy('tanggal', 'ASC')->findAll();
    }
    public function incrementVisitor($id)
    {
        $this->set('jumlah', 'jumlah + 1', false)
            ->where('id_counter', $id)
            ->update();
    }
}
