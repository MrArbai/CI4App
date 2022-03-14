<?php

namespace App\Controllers;

class Forpolio extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | My Forpolio'
        ];
        return view('Forpolio/home',$data);
    }
}
