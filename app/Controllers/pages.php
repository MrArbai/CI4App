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
            'title' => 'home | About Me'
        ];
        echo view('pages/about', $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'home | About Me'
        ];
        echo view('pages/contact', $data);
    }
}
