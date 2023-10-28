<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdmController extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('admin/dashboard', [
            'siswa' => count($this->db->table('murid')->get()->getResultArray()),
            'wali' => count($this->db->table('wali_murid')->get()->getResultArray()),
            'guru' => count($this->db->table('guru')->get()->getResultArray()),
            'kriteria' => count($this->db->table('kriteria')->get()->getResultArray())
        ]);
    }
}