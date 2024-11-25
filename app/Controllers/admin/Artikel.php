<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\KategoriArtikelModel;
use Exception;

class Artikel extends BaseController
{
    protected $artikelModel;
    protected $kategoriArtikelModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();

        $this->kategoriArtikelModel = new KategoriArtikelModel();
    }
    public function index(): string
    {
        $data = [
            'artikel' => $this->artikelModel->findAll(),

        ];
        return view('Admin/Artikel/index', $data);
    }
    public function tambah(): string
    {
        $data = [
            'kategori' => $this->kategoriArtikelModel->findAll(),
  
        ];
        return view('Admin/Artikel/tambah', $data);
    }
    public function simpan()
    {
        $data = [
            'id_ms_artikel' => $this->request->getPost('id_ms_artikel'),
            'judul' => $this->request->getPost('judul'),
            'id_ms_kategori_artikel' => $this->request->getPost('kategori'),
            'aktif' => 1,
            'tanggal' => $this->request->getPost('tanggal'),
            'isi' => $this->request->getPost('isi')
        ];
        try {
            // Attempt to insert the data into the database
            if ($this->artikelModel->save($data)) {
                return redirect()->to('administrator/artikel')->with('message', 'Data inserted successfully');
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed to insert data');
            }
        } catch (Exception $e) {
            // Catch any database-related errors
            return redirect()->back()->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }

    

    public function status($id)
    {
        $data = $this->artikelModel->find($id);
        try {
            // Attempt to insert the data into the database
            if ($data['aktif'] == 1) {
                $this->artikelModel->save([
                    'id_ms_artikel' => $id,
                    'aktif' => '0',
                ]);
            } else {
                $this->artikelModel->save([
                    'id_ms_artikel' => $id,
                    'aktif' => '1',
                ]);
            }
            return redirect()->to('administrator/artikel')->with('message', 'Data inserted successfully');
        } catch (Exception $e) {
            // Catch any database-related errors
            return redirect()->to('administrator/artikel')->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $data = [
            'artikel' => $this->artikelModel->getArtikelWithKategori($id),
            'kategori' => $this->kategoriArtikelModel->findAll(),

        ];
        return view('Admin/Artikel/edit', $data);
    }
    public function update()
    {

        $data = [
            'id_ms_artikel' => $this->request->getPost('id_ms_artikel'),
            'judul' => $this->request->getPost('judul'),
            'id_ms_kategori_artikel' => $this->request->getPost('kategori'),
            'aktif' => 1,
            'tanggal' => $this->request->getPost('tanggal'),
            'isi' => $this->request->getPost('isi')
        ];
        try {
            // Attempt to insert the data into the database
            if ($this->artikelModel->save($data)) {
                return redirect()->to('administrator/artikel')->with('message', 'Data inserted successfully');
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed to insert data');
            }
        } catch (Exception $e) {
            // Catch any database-related errors
            return redirect()->back()->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }
    public function detail($id)
    {
        return view('Admin/Artikel/detail');
    }
    public function hapus($id)
    {
        $this->artikelModel->delete($id);
        return redirect()->to('administrator/artikel');
    }
}
