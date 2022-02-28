<?php

namespace App\Controllers;

class komik extends BaseController
{
    public function index()
    {
       $data = [
           'title' => 'Daftar Komik'
       ];
       return view('komik/index', $data);
    }
}