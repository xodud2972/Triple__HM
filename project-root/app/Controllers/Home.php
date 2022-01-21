<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('header'); // 이와 같이 include가능.
        echo view('index');
        echo view('footer'); // 이와 같이 include가능.
    }
}
