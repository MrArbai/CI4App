<?php

namespace App\Controllers;

class pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'home | Belajar CI4'
        ];
        return view('pages/home', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];
        return view('pages/about', $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'Contact us',
            'Alamat' => [
                [
                    'tipe' => 'Rumah',
                    'Alamat' => 'Jl.Dalang 1',
                    'Kota' => 'Bekasi'
                ],
                [
                    'tipe' => 'Kantor',
                    'Alamat' => 'Jl.plam raya',
                    'Kota' => 'Tembilahan'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}
