<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'code', 'catId', 'supId', 'godown', 'route', 'buyDate',  'sellDate','buyPrice', 'sellPrice','photo'
    ];
}
