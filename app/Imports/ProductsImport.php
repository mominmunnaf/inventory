<?php

namespace App\Imports;

use App\product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new product([
            'name'=>$row[0], 
            'code'=>$row[1], 
            'catId'=>$row[2], 
            'supId'=>$row[3], 
            'godown'=>$row[4], 
            'route'=>$row[5], 
            'buyDate'=>$row[6],  
            'sellDate'=>$row[7],
            'buyPrice'=>$row[8], 
            'sellPrice'=>$row[9], 
            'photo'=>$row[10]
        ]);
    }
}
