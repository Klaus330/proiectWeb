<?php

namespace App\Controllers;

use App\Core\App;
use App\Models\User;

class HomeController
{
    public function index()
    {

        $user = new User();

        $user->email = "claudiupopa330@gmail.com";
        $user->password = "claus";

        $users = User::find([
            'email' => 'claudiupopa330@gmail.com'
        ]);




        $users = App::get('database')->selectAll('users');
        return view('index', compact('users'));
    }
}