<?php


function view($name, $data = [])
{
    extract($data);
    return require "views/{$name}.view.php";
}


function redirect($path)
{
    return require "views/{$path}.view.php";
}