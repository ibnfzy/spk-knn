<?php
namespace App\Controllers;

class Guru extends BaseController
{
  public $db;
  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }

  public function index()
  {
    return view('admin/guru', [
      'data' => $this->db->table('guru')->get()->getResultArray()
    ]);
  }

  public function new()
  {
    return view('admin/guru_add');
  }

  public function create()
  {
    $rules = [
      'nip' => 'required|max_length[18]',
      'fullname' => 'required|max_length[65]',
    ];

    if (!$this->validate($rules)) {
      return redirect()->to(base_url('AdminPanel/guru/new'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
    }

    $data = [
      'nip' => $this->request->getPost('nip'),
      'fullname' => $this->request->getPost('fullname'),
      'password' => password_hash(substr($this->request->getPost('nip'), -4), PASSWORD_BCRYPT)
    ];

    $this->db->table('guru')->insert($data);

    return redirect()->to(base_url('AdminPanel/guru'))->with('type-status', 'success')->with('message', 'Data berhasil ditambahkan');
  }

  public function edit($id)
  {
    return view('admin/guru_edit', [
      'item' => $this->db->table('guru')->where('id_guru', $id)->get()->getRowArray()
    ]);
  }

  public function update($id)
  {
    $rules = [
      'nip' => 'required|max_length[18]',
      'fullname' => 'required|max_length[65]',
    ];

    if (!$this->validate($rules)) {
      return redirect()->to(base_url('AdminPanel/guru/' . $id))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
    }

    $data = [
      'nip' => $this->request->getPost('nip'),
      'fullname' => $this->request->getPost('fullname'),
      'password' => password_hash($this->request->getPost('password') ?? substr($this->request->getPost('nip'), -4), PASSWORD_BCRYPT)
    ];

    $this->db->table('guru')->insert($data);

    return redirect()->to(base_url('AdminPanel/guru'))->with('type-status', 'success')->with('message', 'Data berhasil diubah');
  }

  public function delete($id)
  {
    $this->db->table('guru')->where('id_guru', $id)->delete();

    return redirect()->to(base_url('AdminPanel/guru'))->with('type-status', 'success')->with('message', 'Data berhasil dihapus');
  }
}