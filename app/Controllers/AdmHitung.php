<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class AdmHitung extends BaseController
{
  protected $db;

  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }

  public function index()
  {
    return view('admin/uji', [
      'kriteria' => $this->db->table('kriteria')->get()->getResultArray(),
      'data' => $this->db->table('uji')
    ]);
  }

  public function hitung()
  {
    return view('admin/hitung', [
      'murid' => $this->db->table('murid')->get()->getResultArray()
    ]);
  }
}