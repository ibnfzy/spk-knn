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
      'data' => $this->db->table('uji_knn')->get()->getResultArray()
    ]);
  }

  public function hitung()
  {
    return view('admin/hitung', [
      'murid' => $this->db->table('murid')->get()->getResultArray()
    ]);
  }

  public function uji_add()
  {
    return view('admin/uji_add', [
      'murid' => $this->db->table('murid')->get()->getResultArray(),
      'kriteria' => $this->db->table('kriteria')->get()->getResultArray()
    ]);
  }

  public function uji_save()
  {

    $rules = [
      'id_murid' => 'required',
      'pertanyaan' => 'required',
    ];

    if (!$this->validate($rules)) {
      return redirect()->to(base_url('AdminPanel/uji/new'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
    }

    $getMurid = $this->db->table('murid')->where('id_murid', $this->request->getPost('id_murid'))->get()->getRowArray();

    $uniqueKey = date('Ymd_H:i:s');

    $dataUji = [
      'id_murid' => $this->request->getPost('id_murid'),
      'unique_key' => $uniqueKey,
      'nama_murid' => $getMurid['nama_lengkap']
    ];

    $dataKriteria = [];

    foreach ($this->request->getPost('pertanyaan') as $key => $value) {
      // dd([$key => $value]);
      $getKriteria = $this->db->table('kriteria')->where('nama_kriteria', $key)->get()->getRowArray();

      $dataKriteria[] = [
        'unique_key' => $uniqueKey,
        'id_kriteria' => $getKriteria['id_kriteria'],
        'nama_kriteria' => $key,
        'bobot' => array_sum($value)
      ];

    }

    $this->db->table('uji_knn')->insert($dataUji);
    $this->db->table('uji_kriteria')->insertBatch($dataKriteria);

    return redirect()->to(base_url('AdminPanel/uji'))->with('type-status', 'success')->with('message', 'Data berhasil ditambahkan');
  }

  public function uji_delete($uid)
  {
    $this->db->table('uji_knn')->where('unique_key', $uid)->delete();
    $this->db->table('uji_kriteria')->where('unique_key', $uid)->delete();

    return redirect()->to(base_url('AdminPanel/uji'))->with('type-status', 'success')->with('message', 'Data berhasil dihapus');
  }

  public function uji_exec()
  {
    return view('admin/uji_exec', [
      'data' => $this->db->table('dataset')->get()->getResultArray(),
      'k' => $this->request->getPost('k'),
    ]);
  }
}