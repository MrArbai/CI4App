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
        if (empty($data['komik'])) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(' Judul Komik ' . $slug . ' Tidak di Temukan ');
        }
        return view('komik/detail', $data);
    }

    public function Create()
    {

        $data = [
            'title' => 'Tambah Data Komik',
            'validation' => \Config\Services::validation()
        ];
        return view('komik/create', $data);
    }

    public function Save()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.Judul]',
                'errors' => [
                    'required' => '{field} Komik harus Di Isi',
                    'is_unique' => '{field} Komik Sudah Ada'
                ]
            ]
        ])) {
            $validation =  \Config\Services::validation();
            return redirect()->to('/komik/create')->withinput()->with('validation', $validation);
        }


        // dd($this->request->getvar());
        $slug = url_title($this->request->getvar('judul'), '-', true);
        $this->KomikModel->save([
            'Judul' => $this->request->getvar('judul'),
            'Slug' => $slug,
            'Penulis' => $this->request->getvar('penulis'),
            'Penerbit' => $this->request->getvar('penerbit'),
            'Sampul' => $this->request->getvar('sampul')
        ]);

        session()->setflashdata('pesan', 'Data berhasil Di Simpan');

        return redirect()->to('/komik');
    }

    public function delete($id)
    {
        $this->KomikModel->delete($id);
        session()->setflashdata('pesan', 'Data berhasil Di Hapus');
        return redirect()->to('/komik');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Data Komik',
            'validation' => \Config\Services::validation(),
            'komik' => $this->KomikModel->getKomik($slug)
        ];
        return view('komik/edit', $data);
    }

    public function update($id)
    {
        $komiklama = $this->KomikModel->getKomik($this->getvar('Slug'));
        if ($komiklama['Judul'] == $this->request->getvar('judul')) {
            $rules_judul = 'required';
        } else {
            $rules_judul = 'required|is_unique[komik.Judul]';
        }
        if (!$this->validate([
            'judul' => [
                'rules' => $rules_judul,
                'errors' => [
                    'required' => '{field} Komik harus Di Isi',
                    'is_unique' => '{field} Komik Sudah Ada'
                ]
            ]
        ])) {
            $validation =  \Config\Services::validation();
            return redirect()->to('/komik/create')->withinput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getvar('judul'), '-', true);
        $this->KomikModel->save([
            'id' => $id,
            'Judul' => $this->request->getvar('judul'),
            'Slug' => $slug,
            'Penulis' => $this->request->getvar('penulis'),
            'Penerbit' => $this->request->getvar('penerbit'),
            'Sampul' => $this->request->getvar('sampul')
        ]);

        session()->setflashdata('pesan', 'Data berhasil Di Simpan');

        return redirect()->to('/komik');
    }
}
