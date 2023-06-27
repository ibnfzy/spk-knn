<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Murid extends BaseController
{
  public $db;

  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }

  public function index()
  {
    return view('admin/murid', [
      'data' => $this->db->table('murid')->get()->getResultArray()
    ]);
  }

  public function new()
  {
    return view('admin/murid_add');
  }

  public function create()
  {
    $rules = [
      'nis' => 'required|max_length[10]',
      'nama' => 'required|max_length[65]',
      'kelas' => 'required|max_length[3]'
    ];

    if (!$this->validate($rules)) {
      return redirect()->to(base_url('AdminPanel/murid/new'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
    }

    $data = [
      'nis' => $this->request->getPost('nis'),
      'nama_lengkap' => $this->request->getPost('nama'),
      'kelas' => $this->request->getPost('kelas')
    ];

    $this->db->table('murid')->insert($data);

    return redirect()->to(base_url('AdminPanel/murid'))->with('type-status', 'success')->with('message', 'Data berhasil ditambahkan');
  }

  public function edit($id)
  {
    return view('admin/murid_edit', [
      'item' => $this->db->table('murid')->where('id_murid', $id)->get()->getRowArray()
    ]);
  }

  public function update($id)
  {
    $rules = [
      'nis' => 'required|max_length[10]',
      'nama' => 'required|max_length[65]',
      'kelas' => 'required|max_length[3]'
    ];

    if (!$this->validate($rules)) {
      return redirect()->to(base_url('AdminPanel/murid/' . $id))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
    }

    $data = [
      'nis' => $this->request->getPost('nis'),
      'nama_lengkap' => $this->request->getPost('nama'),
      'kelas' => $this->request->getPost('kelas')
    ];

    $this->db->table('murid')->where('id_murid', $id)->update($data);

    return redirect()->to(base_url('AdminPanel/murid'))->with('type-status', 'success')->with('message', 'Data berhasil diubah');
  }

  public function delete($id)
  {
    $this->db->table('murid')->where('id_murid', $id)->delete();

    return redirect()->to(base_url('AdminPanel/murid'))->with('type-status', 'success')->with('message', 'Data berhasil dihapus');
  }
}