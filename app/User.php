<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primarykey = 'userId';
    public $timestamps = false;
}
