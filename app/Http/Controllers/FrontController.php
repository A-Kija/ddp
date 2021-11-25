<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;
use App\Models\LayoutCat;
use App\Models\LayoutProduct;
use App\Models\Product;
use App\Models\Cat;

class FrontController extends Controller
{
    public function index()
    {
        $pageData = new stdClass;
        $pageData->layout = [];

        $layoutCatsIds = LayoutCat::orderBy('place', 'DESC')
        ->get()
        ->pluck('cat_id')
        ->all();

        foreach ($layoutCatsIds as $key => $layoutCatsId) {
            $pageData->layout[$key] = new stdClass;
            $pageData->layout[$key]->cat = Cat::where('id', $layoutCatsId)->first();
            $pageData->layout[$key]->layoutProducts = LayoutProduct::whereIn('product_id', function($query) use ($layoutCatsId){
                $query->select('product_id')
                ->from('cats_products')
                ->where('cats_products.cat_id', $layoutCatsId);
            })->orderBy('place', 'DESC')
            ->get();
            $pageData->layout[$key]->products = collect();
            foreach( $pageData->layout[$key]->layoutProducts as $layoutProduct) {
                $pageData->layout[$key]->products->add($layoutProduct->getProduct);
            }
        }
        
        return view('front.index', ['pageData' => $pageData]);
    }
}
