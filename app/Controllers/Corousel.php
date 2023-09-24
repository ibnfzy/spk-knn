<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Corousel extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('admin/corousel', [
            'data' => $this->db->table('corousel')->orderBy('id_corousel', 'DESC')->get()->getResultArray()
        ]);
    }

    public function save()
    {
        $rules = [
            'gambar' => 'is_image[gambar]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('AdminPanel/Corousel'))->with('type-status', 'error')
                ->with('dataMessage', $this->validator->getErrors());
        }

        $data = [
            'gambar' => $this->request->getFile('gambar')->getName(),
        ];

        if (!$this->request->getFile('gambar')->hasMoved()) {
            $this->request->getFile('gambar')->move('uploads');
        }

        $this->db->table('corousel')->insert($data);

        return redirect()->to(base_url('AdminPanel/Corousel'))->with('type-status', 'info')
            ->with('message', 'Data berhasil ditambahkan');
    }

    public function delete($id)
    {
        $this->db->table('corousel')->where('id_corousel', $id)->delete();

        return redirect()->to(base_url('AdminPanel/Corousel'))->with('type-status', 'info')
            ->with('message', 'Data berhasil ditambahkan');
    }
}