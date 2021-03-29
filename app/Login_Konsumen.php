<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Login_Konsumen extends Authenticatable
{
    protected $table = 'konsumen';
}
