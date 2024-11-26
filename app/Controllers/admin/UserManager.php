<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MenuModel;
use App\Models\UserManagerModel;

class UserManager extends BaseController
{

    protected $userModel;
    protected $menu;

    public function __construct()
    {
        
        $this->userModel = new UserManagerModel();
    }

    // List users
    public function index()
    {
        $data = [
            
            'users' => $this->userModel->findAll()
        ];
        return view('Admin\UserManager\index', $data);
    }
    public function tambah()
    {
        $data = [
            
        ];
        return view('Admin\UserManager\tambah', $data);
    }
    public function update($id)
    {
        $data = [
            
            'user' => $this->userModel->find($id),
            'type' => 'update'

        ];
        return view('Admin\UserManager\tambah', $data);
    }
    // Create a new user
    public function simpan()
    {

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role'),
            'nama' => $this->request->getPost('nama'),
            'aktif' => $this->request->getPost('aktif'),
            'online' => '0',
        ];
        if ($this->userModel->save($data)) {
            return redirect()->to('administrator/usermanager')->withInput();
        } else {
            return redirect()->to('administrator/usermanager/tambah')->withInput();
        }
    }

    // Edit user
    public function edit($id)
    {

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role'),
            'nama' => $this->request->getPost('nama'),
            'aktif' => $this->request->getPost('aktif'),
            'online' => '0',
        ];
        $this->userModel->update($id, $data);

        return redirect()->to('/usermanager');
    }
}
