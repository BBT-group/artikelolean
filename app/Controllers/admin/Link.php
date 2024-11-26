<?php

namespace App\Controllers\Admin;

use App\Models\LinkModel;
use App\Controllers\BaseController;
use Exception;

class Link extends BaseController
{
    protected $link;
    protected $menu;

    public function __construct()
    {
        
        $this->link = new LinkModel();
    }
    public function index(): string
    {
        $data = [
        
            'link' => $this->link->findAll()
        ];
        return view('Admin/Link/index', $data);
    }
    public function tambah()
    {
        $data = [

        ];
        return view('Admin/Link/tambah', $data);
    }
    public function simpan()
    {
        $data = [
            'nama_link' => $this->request->getPost('nama_link'),
            'isi_link' => $this->request->getPost('isi_link'),
            'aktif' => 1,
        ];
        try {
            // Attempt to insert the data into the database
            if ($this->link->save($data)) {
                return redirect()->to('administrator/link')->with('message', 'Data inserted successfully');
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
        $data = $this->link->find($id);
        try {
            // Attempt to insert the data into the database
            if ($data['aktif'] == 1) {
                $this->link->save([
                    'id_ms_link' => $id,
                    'aktif' => '0',
                ]);
            } else {
                $this->link->save([
                    'id_ms_link' => $id,
                    'aktif' => '1',
                ]);
            }
            return redirect()->to('administrator/link')->with('message', 'Data inserted successfully');
        } catch (Exception $e) {
            // Catch any database-related errors
            return redirect()->to('administrator/link')->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $data = [
            'link' => $this->link->getFooterbyid($id),
        ];
        return view('Admin/Link/edit', $data);
    }
    public function update()
    {

        $data = [
            'id_ms_link' => $this->request->getPost('id_ms_link'),
            'nama_link' => $this->request->getPost('nama_link'),
            'isi_link' => $this->request->getPost('isi_link'),
            'aktif' => 0,
        ];
        try {
            // Attempt to insert the data into the database
            if ($this->link->save($data)) {
                return redirect()->to('administrator/link')->with('message', 'Data inserted successfully');
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
        return view('Admin/Link/detail');
    }
    public function hapus($id)
    {
        $this->link->delete($id);
        return redirect()->to('/administrator/link');
    }
}
