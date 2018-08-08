<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_students extends Model
{
    protected $table = 'tbl_students';
    protected $fillable = ['name','gender','slug'];
}
