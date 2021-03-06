<?php


function view($name, $data = [])
{
    extract($data);
    return require "resources/views/{$name}.view.php";
}


function redirect($path)
{
    return require "resources/views/{$path}.view.php";
}