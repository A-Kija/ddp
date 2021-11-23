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

    public function index()
    {
        $layoutProducts = LayoutProduct::orderBy('place', 'DESC')->get();
        return view('back.layoutProduct.index', ['layoutProducts' => $layoutProducts]);
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


    public function up(LayoutProduct $layoutProduct)
    {
        $upLayout = LayoutProduct::orderBy('place', 'ASC')
        ->where('place', '>', $layoutProduct->place)
        ->first();

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

    public function down(LayoutProduct $layoutProduct)
    {
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
