<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class Kriteria extends BaseController
{
  protected $db;

  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }

  public function index()
  {
    return view('admin/kriteria', [
      'data' => $this->db->table('kriteria')->get()->getResultArray()
    ]);
  }

  public function new()
  {
    return view('admin/kriteria_add');
  }

  public function create()
  {
    $rules = [
      'nama_kriteria' => 'required|max_length[65]',
      'bobot' => 'required|max_length[2]'
    ];

    if (!$this->validate($rules)) {
      return redirect()->to(base_url('AdminPanel/kriteria/new'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
    }

    $data = [
      'nama_kriteria' => $this->request->getPost('nama_kriteria'),
      'bobot' => $this->request->getPost('bobot')
    ];

    $this->db->table('kriteria')->insert($data);

    return redirect()->to(base_url('AdminPanel/kriteria'))->with('type-status', 'success')->with('message', 'Data berhasil ditambah');
  }

  public function edit($id)
  {
    return view('admin/kriteria_edit', [
      'data' => $this->db->table('kriteria')->where('id_kriteria', $id)->get()->getRowArray()
    ]);
  }

  public function update($id)
  {
    $rules = [
      'nama_kriteria' => 'required|max_length[65]',
      'bobot' => 'required|max_length[2]'
    ];

    if (!$this->validate($rules)) {
      return redirect()->to(base_url('AdminPanel/kriteria/' . $id))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
    }

    $data = [
      'nama_kriteria' => $this->request->getPost('nama_kriteria'),
      'bobot' => $this->request->getPost('bobot')
    ];

    $this->db->table('kriteria')->where('id_kriteria', $id)->update($data);

    return redirect()->to(base_url('AdminPanel/kriteria'))->with('type-status', 'success')->with('message', 'Data berhasil diubah');
  }

  public function delete($id)
  {
    $this->db->table('kriteria')->where('id_kriteria', $id)->delete();

    return redirect()->to(base_url('AdminPanel/kriteria'))->with('type-status', 'success')->with('message', 'Data berhasil dihapus');
  }
}