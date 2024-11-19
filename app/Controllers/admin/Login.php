<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelLogin;
use App\Models\UserManagerModel;

class Login extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = new UserManagerModel();
    }
    public function index(): string
    {
        return view('Admin/login');
    }

    public function loginProses()
    {

        $post = $this->request->getPost();
        $query = $this->data->table('ms_user_manager')->getWhere(['username' => $post['username']]);
        $user = $query->getRow();
        if ($user) {
            if ($post['password'] == $user->password) {

                date_default_timezone_set('Asia/Jakarta');
                $currentDateTime = date("Y-m-d H:i:s");

                $this->data->save(['id_ms_user_manager' => $user->id_ms_user_manager, 'online' => '1', 'last_login' => $currentDateTime]);

                // Set session data
                session()->set([
                    'user_id' => $user->id_ms_user_manager,
                    'nama' => $user->nama,
                    'is_logged_in' => true,
                ]);

                return redirect()->to(base_url('/administrator/beranda'))->with('login_suceess', 'Tambahkan Kategori dan Satuan terlebih dahulu sebelum menambahkan Barang baru');
            } elseif (password_verify($post['password'], $user->password)) {
                date_default_timezone_set('Asia/Jakarta');
                $currentDateTime = date("Y-m-d H:i:s");

                $this->data->save(['id_ms_user_manager' => $user->id_ms_user_manager, 'online' => '1', 'last_login' => $currentDateTime]);

                // Set session data
                session()->set([
                    'user_id' => $user->id_ms_user_manager,
                    'nama' => $user->nama,
                    'is_logged_in' => true,
                ]);


                return redirect()->to(base_url('/administrator/beranda'));
            } else {
                return redirect()->back()->with('error', 'Password tidak sesuai');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak sesuai');
        }
    }

    public function logout()
    {
        $userId = session()->get('user_id');
        date_default_timezone_set('Asia/Jakarta');
        $currentDateTime = date("Y-m-d H:i:s");
        // Set user as offline
        $this->data->save(['id_ms_user_manager' => $userId, 'online' => '0', 'last_login' => $currentDateTime]);


        session()->remove('nama');
        return redirect()->to(base_url('administrator/login'));
    }
}
