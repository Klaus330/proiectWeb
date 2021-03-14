<?php


namespace App\Models;


use App\Core\Model;

class User extends Model
{
    protected $tableName = 'users';

    public $email;
    public $password;


}