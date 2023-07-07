<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class Kuisoner extends BaseController
{
  public $db;

  public function __construct()
  {
    $this->db = \Config\Database::connect();
  }

  public function index()
  {
    return view('admin/kuis', [
      'data' => $this->db->table('kuisoner')->orderBy('id_kuisoner', 'DESC')->get()->getResultArray()
    ]);
  }

  public function new()
  {
    return view('admin/kuis_add', [
      'option' => $this->db->table('kriteria')->get()->getResultArray()
    ]);
  }

  public function create()
  {
    $rules = [
      'tanya' => 'required',
      'kriteria' => 'required',
    ];

    if (!$this->validate($rules)) {
      return redirect()->to(base_url('AdminPanel/kuisoner/new'))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
    }

    $data = [
      'pertanyaan' => $this->request->getPost('tanya'),
      'kriteria' => $this->request->getPost('kriteria'),
    ];

    $this->db->table('kuisoner')->insert($data);

    return redirect()->to(base_url('AdminPanel/kuisoner'))->with('type-status', 'success')->with('message', 'Data berhasil ditambahkan');
  }

  public function edit($id)
  {
    return view('admin/kuis_edit', [
      'data' => $this->db->table('kuisoner')->where('id_kuisoner', $id)->get()->getRowArray(),
      'option' => $this->db->table('kriteria')->get()->getResultArray()
    ]);
  }

  public function update($id)
  {
    $rules = [
      'tanya' => 'required',
      'kriteria' => 'required',
    ];

    if (!$this->validate($rules)) {
      return redirect()->to(base_url('AdminPanel/kuisoner/' . $id))->with('type-status', 'error')->with('dataMessage', $this->validator->getErrors());
    }

    $data = [
      'pertanyaan' => $this->request->getPost('tanya'),
      'kriteria' => $this->request->getPost('kriteria'),
    ];

    $this->db->table('kuisoner')->where('id_kuisoner', $id)->update($data);

    return redirect()->to(base_url('AdminPanel/kuisoner'))->with('type-status', 'success')->with('message', 'Data berhasil diubah');
  }

  public function delete($id)
  {
    $this->db->table('kuisoner')->where('id_kuisoner', $id)->delete();

    return redirect()->to(base_url('AdminPanel/kuisoner'))->with('type-status', 'success')->with('message', 'Data berhasil dihapus');
  }
}