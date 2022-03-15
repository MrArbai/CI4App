<?php

namespace App\Controllers;

class Forpolio extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | My Forpolio'
        ];
        return view('Forpolio/home', $data);
    }

    public function sidebar_left()
    {
        $data = [
            'title' => ''
        ];
        return view('Forpolio/sidebar_left', $data);
    }

    public function sidebar_right()
    {
        $data = [
            'title' => ''
        ];
        return view('Forpolio/sidebar_right', $data);
    }
    public function single()
    {
        $data = [
            'title' => ''
        ];
        return view('Forpolio/single', $data);
    }
    public function blog()
    {
        $data = [
            'title' => ''
        ];
        return view('Forpolio/blog', $data);
    }
    public function About()
    {
        $data = [
            'title' => 'About'
        ];
        return view('Forpolio/About', $data);
    }
}
