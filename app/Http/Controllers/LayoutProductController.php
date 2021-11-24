<?php

namespace App\Http\Controllers;

use App\Models\LayoutProduct;
use App\Models\Product;
use App\Models\Cat;
use Illuminate\Http\Request;

class LayoutProductController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Cat $cat)
    {
        if (null === $cat->id) {
            $message = 'Please select Category to do layout.';
            $header = 'Category layout selector';
            $layoutProducts = collect();
        }
        else {
            $message = 'This category has no products.';
            $header = $cat->title.' Layout.';
            $catId = $cat->id;
            $layoutProducts = LayoutProduct::whereIn('product_id', function($query) use ($catId){
                $query->select('product_id')
                ->from('cats_products')
                ->where('cats_products.cat_id', $catId);
            })->orderBy('place', 'DESC')
            ->get();
        }
       
        $cats = Cat::all();
        return view('back.layoutProduct.index', [
            'layoutProducts' => $layoutProducts,
            'cats' => $cats,
            'message' => $message,
            'header' => $header,
            'catNow' => $cat
        ]);
    }

    public function create()
    {
        $products = Product::all();
        $usedProducts = LayoutProduct::all()->pluck('product_id')->all();

        return view('back.layoutProduct.create', [
            'products' => $products,
            'usedProducts' => $usedProducts
        ]);
    }

    public function store(Request $request)
    {
        
        $usedProducts = LayoutProduct::all()->pluck('product_id')->all();
        if (in_array($request->layout_product_id, $usedProducts)) {
            $request->flash();
            return redirect()->back()->with('info_message', 'The product already added.');
        }
       
        
        $layoutProduct = new LayoutProduct;
        $layoutProduct->product_id = $request->layout_product_id;
        $layoutProduct->place = 0;
        $layoutProduct->save();// tik nuo cia atsiranda modelyje ID
        $layoutProduct->place = $layoutProduct->id;
        $layoutProduct->save();
        return redirect()->route('layoutProduct.index')->with('success_message', 'New layoutProduct has arrived.');
    }


    public function up(LayoutProduct $layoutProduct, Cat $cat)
    {

        $catId = $cat->id;

        $upLayout = LayoutProduct::whereIn('product_id', function($query) use ($catId){
            $query->select('product_id')
            ->from('cats_products')
            ->where('cats_products.cat_id', $catId);
        })->orderBy('place', 'ASC')
        ->where('place', '>', $layoutProduct->place)
        ->first();
        
        
        // $upLayout = LayoutProduct::orderBy('place', 'ASC')
        // ->where('place', '>', $layoutProduct->place)
        // ->first();

        if (null !== $upLayout) {
            $place = $layoutProduct->place;
            $layoutProduct->place = $upLayout->place;
            $upLayout->place = $place;
            $layoutProduct->save();
            $upLayout->save();
            return redirect()->back()->with('success_message', 'Layout was changed.');
        }
        return redirect()->back()->with('info_message', 'This productegory already is in the Layout top position.');
    }

    public function down(LayoutProduct $layoutProduct, Cat $cat)
    {
        
        $catId = $cat->id;
        $downLayout = LayoutProduct::whereIn('product_id', function($query) use ($catId){
            $query->select('product_id')
            ->from('cats_products')
            ->where('cats_products.cat_id', $catId);
        })->orderBy('place', 'DESC')
        ->where('place', '<', $layoutProduct->place)
        ->first();
        
        
        $downLayout = LayoutProduct::orderBy('place', 'DESC')
        ->where('place', '<', $layoutProduct->place)
        ->first();

        if (null !== $downLayout) {
            $place = $layoutProduct->place;
            $layoutProduct->place = $downLayout->place;
            $downLayout->place = $place;
            $layoutProduct->save();
            $downLayout->save();
            return redirect()->back()->with('success_message', 'Layout was changed.');
        }
        return redirect()->back()->with('info_message', 'This productegory already is in the Layout bottom position.');
    }





    public function destroy(LayoutProduct $layoutProduct)
    {
        // if ($layoutProduct->layoutProductHasOutfits->count()){
        //     return redirect()->back()->with('info_message', 'There is job to do. Can\'t delete.');
        // }
        $layoutProduct->delete();
        return redirect()->route('layoutProduct.index')->with('success_message', 'LayoutProduct gone.');
    }
}
