<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\KategoriArtikelModel;
use Exception;

class KategoriArtikel extends BaseController
{
    protected $menu;
    protected $kategoriArtikelModel;

    public function __construct()
    {
        $this->kategoriArtikelModel = new KategoriArtikelModel();
    }
    public function index(): string
    {
        $data = [
            'artikel' => $this->kategoriArtikelModel->findAll(),

        ];
        return view('Admin/KategoriArtikel/index', $data);
    }
    public function tambah(): string
    {
        $data = [

        ];
        return view('Admin/KategoriArtikel/tambah', $data);
    }
    public function simpan()
    {
        $this->kategoriArtikelModel->save([
            'nama_kategori' => $this->request->getPost('kategori'),
            'aktif' => 1
        ]);

        return redirect()->to('administrator/artikel/kategori/');
    }

    public function edit($id)
    {
        $data = [
            'kategori' => $this->kategoriArtikelModel->find($id),
        ];
        return view('Admin/KategoriArtikel/edit', $data);
    }
    public function detail(): string
    {
        return view('Admin/KategoriArtikel/detail');
    }
    public function status($id)
    {
        $data = $this->kategoriArtikelModel->find($id);
        try {
            // Attempt to insert the data into the database
            if ($data['aktif'] == 1) {
                $this->kategoriArtikelModel->save([
                    'id_ms_kategori_artikel' => $id,
                    'aktif' => '0',
                ]);
            } else {
                $this->kategoriArtikelModel->save([
                    'id_ms_kategori_artikel' => $id,
                    'aktif' => '1',
                ]);
            }
            return redirect()->to('administrator/artikel/kategori')->with('message', 'Data inserted successfully');
        } catch (Exception $e) {
            // Catch any database-related errors
            return redirect()->to('administrator/artikel/kategori')->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }
    public function hapus($id)
    {
        $this->kategoriArtikelModel->delete($id);
        return redirect()->to('administrator/artikel/kategori');
    }
    public function update()
    {

        $data = [
            'id_ms_kategori_artikel' => $this->request->getPost('id_ms_kategori_artikel'),
            'nama_kategori' => $this->request->getPost('kategori'),
            'aktif' => 1,
        ];
        try {
            // Attempt to insert the data into the database
            if ($this->kategoriArtikelModel->save($data)) {
                return redirect()->to('administrator/artikel/kategori')->with('message', 'Data inserted successfully');
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed to insert data');
            }
        } catch (Exception $e) {
            // Catch any database-related errors
            return redirect()->back()->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }
}
