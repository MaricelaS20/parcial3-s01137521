<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class BarchartController extends Controller
{
    public function barchart(Request $request)
    {   //Product::has('categories', '=', 2)->get(); 	
        $ropacat = Category::find(1);
        $ropa = $ropacat->products;
        $perfumecat=Category::find(2);
        $perfume = $perfumecat->products;
        $ropa_count = count($ropa);     
        $perfume_count = count($perfume);
        return view('products.barchart',compact('ropa_count','perfume_count'));
    }
}
