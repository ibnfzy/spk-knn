<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        return view('web/index', [
            'corousel' => $this->db->table('corousel')->get()->getResultArray()
        ]);
    }
}