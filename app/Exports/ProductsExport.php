<?php

namespace App\Exports;

use App\product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return product::select('name', 'code', 'catId', 'supId', 'godown', 'route', 'buyDate',  'sellDate','buyPrice', 'sellPrice', 'photo')->get();
    }


    public function export(){
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    
}
