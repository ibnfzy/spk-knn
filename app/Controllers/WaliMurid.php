<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class WaliMurid extends BaseController
{
  public $db;

  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }

  public function index()
  {
    return view('admin/wali', [
      'data' => $this->db->table('wali_murid')->get()->getResultArray()
    ]);
  }

  public function new()
  {
    return view('admin/wali_add', [
      'item' => $this->db->table('murid')->get()->getResultArray()
    ]);
  }

  public function create()
  {
    $rules = [
      'id_murid' => 'required',
      'nama_wali' => 'required|max_length[65]',
      'nomor_hp' => 'required|max_length[13]|min_length[10]'
    ];

    if (!$this->validate($rules)) {
      return redirect()->to(base_url('AdminPanel/wali/new'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
    }

    $data = [
      'id_murid' => $this->request->getPost('id_murid'),
      'nama_wali' => $this->request->getPost('nama_wali'),
      'nomor_hp' => $this->request->getPost('nomor_hp'),
      'password' => substr($this->request->getPost('nomor_hp'), -4),
    ];

    $this->db->table('wali_murid')->insert($data);

    return redirect()->to(base_url('AdminPanel/wali'))->with('type-status', 'success')->with('message', 'Data berhasil ditambahkan')->with('sendWa', $this->request->getPost('nomor_hp'));
  }

  public function edit($id)
  {
    return view('admin/wali_edit', [
      'item' => $this->db->table('murid')->get()->getResultArray(),
      'data' => $this->db->table('wali_murid')->where('id_wali_murid', $id)->get()->getRowArray()
    ]);
  }

  public function update($id)
  {
    $rules = [
      'id_murid' => 'required',
      'nama_wali' => 'required|max_length[65]',
      'nomor_hp' => 'required|max_length[13]|min_length[10]'
    ];

    if (!$this->validate($rules)) {
      return redirect()->to(base_url('AdminPanel/wali/' . $id))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
    }

    $data = [
      'id_murid' => $this->request->getPost('id_murid'),
      'nama_wali' => $this->request->getPost('nama_wali'),
      'nomor_hp' => $this->request->getPost('nomor_hp'),
      'password' => substr($this->request->getPost('nomor_hp'), -4),
    ];

    $this->db->table('wali_murid')->where('id_wali_murid', $id)->update($data);

    return redirect()->to(base_url('AdminPanel/wali'))->with('type-status', 'success')->with('message', 'Data berhasil diubah')->with('sendWa', $this->request->getPost('nomor_hp'));
  }

  public function delete($id)
  {
    $this->db->table('wali_murid')->where('id_wali_murid', $id)->delete();
    return redirect()->to(base_url('AdminPanel/wali'))->with('type-status', 'success')->with('message', 'Data berhasil dihapus');
  }
}