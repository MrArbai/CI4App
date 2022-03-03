<?php

namespace App\Controllers;

use App\Models\KomikModel;

class komik extends BaseController
{
    protected $KomikModel;
    public function __construct()
    {
        $this->KomikModel = new KomikModel();
    }
    public function index()
    {
        $komik = $this->KomikModel->findall();
       $data = [
           'title' => 'Daftar Komik',
           'komik' => $this->KomikModel->getKomik()
       ];

    //    $komikmodel = new \App\models\komikmodel();

       return view('komik/index', $data);
    }

    public function detail($slug)
    {
        $data = [
           'title' => 'Daftar Komik',
           'komik' => $this->KomikModel->getKomik($slug)
       ];
       return view('komik/detail',$data);
    }
}