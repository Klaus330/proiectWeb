<?php

namespace App\Controllers;

use App\Core\App;

class HomeController
{
    public function index()
    {
        $users = App::get('database')->selectAll('users');
        return view('index', compact('users'));
    }
}