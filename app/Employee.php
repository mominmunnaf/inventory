<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name', 'f_name', 'address', 'phone','nid','email', 'salary','experience', 'photo'
    ];

}
