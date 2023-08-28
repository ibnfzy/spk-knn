<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class GuruLogin extends BaseController
{
    public $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('login/guru');
    }

    public function auth()
    {
        $session = session();

        $nip = $this->request->getPost('nip');
        $password = $this->request->getPost('password');

        $data = $this->db->table('guru')->where('nip', $nip)->get()->getRowArray();

        if ($data) {
            $password_data = $data['password'];
            $id = $data['id_guru'];

            $verify = password_verify($password ?? '', $password_data);

            if ($verify) {
                $sessionData = [
                    'id_guru' => $data['id_guru'],
                    'fullname' => $data['fullname'],
                    'nip' => $data['nip'],
                    'logged_in_guru' => TRUE
                ];

                $session->set($sessionData);
                // $session->markAsTempdata('logged_in_guru', 1800); //timeout 30 menit

                return redirect()->to(base_url('GuruPanel'))->with('type-status', 'info')
                    ->with('message', 'Selamat Datang Kembali ' . $sessionData['fullname']);
            } else {
                return redirect()->to(base_url('Login/guru'))->with('type-status', 'error')
                    ->with('message', 'Password tidak benar');
            }
        } else {
            return redirect()->to(base_url('Login/guru'))->with('type-status', 'error')
                ->with('message', 'nip tidak benar');
        }
    }

    public function logoff()
    {
        $session = session();

        $session->destroy();

        return redirect()->to(base_url('Login/guru'));
    }
}