<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\CounterModel;

class Beranda extends BaseController
{
    protected $artikelModel;
    protected $counterModel;
    

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
        $this->counterModel = new CounterModel();
        
    }
    public function index(): string
    {
        // Fetch daily visitor data
        $dailyVisitors = $this->counterModel->getDailyVisitors();

        // Fetch top 10 most viewed news
        $mostViewedNews = $this->artikelModel->getTop10MostViewed();
        // Fetch total visitors today
        date_default_timezone_set('Asia/Jakarta');
        $todayDate = date('Y-m-d');
        $totalVisitorsToday = $this->counterModel->where('tanggal', $todayDate)->selectSum('jumlah')->first();

        // Fetch total visitors all time
        $totalVisitorsAllTime = $this->counterModel->selectSum('jumlah')->first();


        $data = [
            'dailyVisitors' => $dailyVisitors,
            'mostViewedNews' => $mostViewedNews,
            'totalVisitorsToday' => $totalVisitorsToday['jumlah'] ?? 0,
            'totalVisitorsAllTime' => $totalVisitorsAllTime['jumlah'] ?? 0,
            // 'menu' => $this->menu->findAll()
        ]; // Pass JSON data to view]

        return view('Admin/beranda', $data);
    }
}
