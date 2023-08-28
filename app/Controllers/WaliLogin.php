<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class WaliLogin extends BaseController
{
    public $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('login/wali');
    }

    public function auth()
    {
        $session = session();

        $nomor_hp = $this->request->getPost('nomor_hp');
        $password = (string) $this->request->getPost('password');

        $data = $this->db->table('wali_murid')->where('nomor_hp', $nomor_hp)->get()->getRowArray();

        if ($data) {
            $password_data = $data['password'];

            $verify = password_verify($password, $password_data);

            if ($verify) {
                $sessionData = [
                    'id_wali_murid' => $data['id_wali_murid'],
                    'id_murid' => $data['id_murid'],
                    'nama_wali' => $data['nama_wali'],
                    'nomor_hp' => $data['nomor_hp'],
                    'logged_in_wali_murid' => TRUE
                ];

                $session->set($sessionData);
                // $session->markAsTempdata('logged_in_wali_murid', 1800); //timeout 30 menit

                return redirect()->to(base_url('GuruPanel'))->with('type-status', 'info')
                    ->with('message', 'Selamat Datang Kembali ' . $sessionData['nama_wali']);
            } else {
                return redirect()->to(base_url('Login/wali_murid'))->with('type-status', 'error')
                    ->with('message', 'Password tidak benar');
            }
        } else {
            return redirect()->to(base_url('Login/wali_murid'))->with('type-status', 'error')
                ->with('message', 'Nomor HP tidak benar');
        }
    }

    public function logoff()
    {
        $session = session();

        $session->destroy();

        return redirect()->to(base_url('Login/wali_murid'));
    }
}