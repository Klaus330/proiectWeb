<?php


class HomeController
{
    public function index()
    {
        $users = App::get('database')->selectAll('users');
        return view('index', compact('users'));
    }
}