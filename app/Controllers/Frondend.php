<?php

namespace App\Controllers;

use App\Models\AlbumModel;
use App\Models\ArtikelModel;
use App\Models\ContactModel;
use App\Models\ContentModel;
use App\Models\FotoModel;
use App\Models\KategoriArtikelModel;
use App\Models\KategoriTournamentModel;
use App\Models\LinkModel;
use App\Models\BannerModel;
use App\Models\ChatwaModel;
use App\Models\CounterModel;
use App\Models\MenuModel;
use App\Models\TournamentModel;
use App\Models\VideoModel;

class Frondend extends BaseController
{
    protected $chatwa;
    protected $contact;
    protected $content;
    protected $album;
    protected $foto;
    protected $video;
    protected $banner;
    protected $link;
    protected $kategoriArtikel;
    protected $turnament;
    protected $kategoriTurnament;
    protected $artikel;
    protected $menu;
    protected $counter;
    public function __construct()
    {
        $this->counter = new CounterModel();
        // $this->content = new ContentModel();
        // $this->foto = new FotoModel();
        // $this->menu = new MenuModel();
        // $this->video = new VideoModel();
        // $this->album = new AlbumModel();
        // $this->banner = new BannerModel();
        // $this->contact = new ContactModel();
        // $this->link = new LinkModel();
        $this->kategoriArtikel = new KategoriArtikelModel();
        $this->artikel = new ArtikelModel();
        // $this->kategoriTurnament = new KategoriTournamentModel();
        // $this->turnament = new TournamentModel();
        // $this->chatwa = new ChatwaModel();
    }
    public function index()
    {

        $artikels = $this->artikel->findAll();

        foreach ($artikels as &$artikel) {
            $artikel['thumbnail'] = $this->artikel->extractThumbnail($artikel['isi']);
        }

        date_default_timezone_set('Asia/Jakarta');
        $today = date('Y-m-d');
        // Check if there's an entry for today's date
        $existingRecord = $this->counter->getTodayVisitor();

        if ($existingRecord) {
            // Increment jumlah for today's entry
            $this->counter->incrementVisitor($existingRecord['id_counter']);
        } else {
            // Insert a new record for today
            $this->counter->insert(['jumlah' => 1, 'tanggal' => $today]);
        }

        $data = [
            'artikels' => $artikels,
            // 'chatwa' => $this->chatwa->where('aktif', '1')->first(),
            // 'menu' => $this->menu->findAll(),
            // 'banner' => $this->banner->findAll(),
            // 'contact' => $this->contact->findAll(),
            // 'link' => $this->link->findAll(),
            'kategori' => $this->kategoriArtikel->findAll(),
            // 'video' => $this->video->where('aktif', '1')->first(),
        ];
        $this->counter;
        return view('frondend/index', $data);
    }

    public function turnament()
    {
        $data = [
            'menu' => $this->menu->findAll(),
            'contact' => $this->contact->findAll(),
            'chatwa' => $this->chatwa->where('aktif', '1')->first(),
            'link' => $this->link->findAll(),
            'video' => $this->video->where('aktif', '1')->first(),
            'kategori' => $this->kategoriTurnament->findAll(),
            'tournament' => $this->turnament->findAll()
        ];
        return view('frondend/turnament', $data);
    }

    public function content($id_ms_menu = null)
    {
        $data = [
            'menu' => $this->menu->where('aktif', 1)->findAll(),
            'menu1' => $this->menu->where('id_ms_menu', $id_ms_menu)->findAll(),
            'chatwa' => $this->chatwa->where('aktif', '1')->first(),
            'content' => $this->content->where('id_ms_menu', $id_ms_menu)->findAll(),
            'contact' => $this->contact->findAll(),
            'video' => $this->video->where('aktif', '1')->first(),
            'link' => $this->link->findAll()

        ];
        return view('frondend/content', $data);
    }

    public function gallery()
    {
        $data = [
            'menu' => $this->menu->findAll(),
            'chatwa' => $this->chatwa->where('aktif', '1')->first(),
            'album' => $this->album->findAll(),
            'contact' => $this->contact->findAll(),
            'video' => $this->video->where('aktif', '1')->first(),
            'link' => $this->link->findAll()

        ];
        return view('frondend/gallery', $data);
    }

    public function isi_gallery($id_ms_album)
    {
        $data = [
            'menu' => $this->menu->findAll(),
            'album' => $this->album->find($id_ms_album),
            'chatwa' => $this->chatwa->where('aktif', '1')->first(),
            'albums' => $this->album->findAll(),
            'foto' => $this->foto->where('id_ms_album', $id_ms_album)->findAll(),
            'video' => $this->video->where('id_ms_album', $id_ms_album)->findAll(),
            'video' => $this->video->where('aktif', '1')->first(),
            'contact' => $this->contact->findAll(),
            'link' => $this->link->findAll()
        ];
        return view('frondend/isi_gallery', $data);
    }

    public function artikel()
    {
        if ($this->request->getPost('keyword_artikel') != null) {
            $keyword = $this->request->getPost('keyword_artikel');
            $artikels = $this->artikel->like('judul', $keyword)->findAll();
        } else {
            $artikels = $this->artikel->findAll();
        }

        foreach ($artikels as &$artikel) {
            $artikel['thumbnail'] = $this->artikel->extractThumbnail($artikel['deskripsi']);
        }

        $data = [
            'menu' => $this->menu->findAll(),
            'artikels' => $artikels,
            'chatwa' => $this->chatwa->where('aktif', '1')->first(),
            'contact' => $this->contact->findAll(),
            'link' => $this->link->findAll(),
            'video' => $this->video->where('aktif', '1')->first(),
            'kategori' => $this->kategoriArtikel->findAll()
        ];
        return view('frondend/artikel', $data);
    }
    public function isi_artikel($id)
    {
        $artikels = $this->artikel->where('id_ms_kategori_artikel', $id)->where('aktif', 1)->findAll();

        foreach ($artikels as $artikel) {
            $artikel['thumbnail'] = $this->artikel->extractThumbnail($artikel['isi']);
        }

        $data = [
            // 'menu' => $this->menu->findAll(),
            'artikels' => $artikels,
            // 'chatwa' => $this->chatwa->where('aktif', '1')->first(),
            'isi_artikel' => $this->artikel->find($id), 
            // 'contact' => $this->contact->findAll(),
            // 'link' => $this->link->findAll(),
            // 'video' => $this->video->where('aktif', '1')->first(),
            'kategori' => $this->kategoriArtikel->findAll()
        ];
        $newsItem = $this->artikel->find($id);
        $this->artikel->update($id, ['viewer' => $newsItem['viewer'] + 1]);
        return view('frondend/isi_artikel', $data);
    }
    public function kategoriartikel($id)
    {
        $artikels = $this->artikel->where('id_ms_kategori_artikel', $id)->where('aktif', 1)->findAll();

        foreach ($artikels as &$artikel) {
            $artikel['thumbnail'] = $this->artikel->extractThumbnail($artikel['isi']);
            $artikel['snippet'] = $this->artikel->extractSnippet($artikel['isi']);
        }

        $data = [
            'artikels' => $artikels,
            // 'chatwa' => $this->chatwa->where('aktif', '1')->first(),
            // 'menu' => $this->menu->findAll(),
            // 'contact' => $this->contact->findAll(),
            // 'link' => $this->link->findAll(),
            // 'video' => $this->video->where('aktif', '1')->first(),
            'kategori' => $this->kategoriArtikel->findAll(),
            'kategoris' => $this->kategoriArtikel->find($id)
        ];
        return view('frondend/kategori_artikel', $data);
    }
}
