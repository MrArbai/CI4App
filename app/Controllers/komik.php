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
        if (empty($data['komik'])){

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(' Judul Komik ' . $slug . ' Tidak di Temukan ');
            
        }
        return view('komik/detail', $data);
    }

    public function Create()
    {
        $data = [
            'title' => 'Tambah Data Komik'
        ];
        return view('komik/create', $data);
    }

    public function Save()
    {
        // dd($this->request->getvar());
        $slug = url_title($this->request->getvar('judul'),'-',true);
        $this->KomikModel->save([
            'Judul' => $this->request->getvar('judul'),
            'Slug' => $slug,
            'Penulis' => $this->request->getvar('penulis'),
            'Penerbit' => $this->request->getvar('penerbit'),
            'Sampul' => $this->request->getvar('sampul')
        ]);

        session()->setflashdata('pesan','Data berhasil Di Simpan');
        
        return redirect()->to('/komik');
    }
}
