<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;

class CartController extends Controller
{
    
       
    public function add(Product $product)
    {
        // [id] => [count => 5]
        // [id] => [count => 9]

        $cart = Session::get('cart', []);
        $id = (int) $product->id;
        if (isset($cart[$id])) {
            $cart[$id]['count']++;
        }
        else {
            $cart[$id] = ['count' => 1];
        }
        Session::put('cart', $cart);
        return redirect()->back();
    }

    public function remove(Product $product)
    {
        $cart = Session::get('cart', []);
        $id = (int) $product->id;
        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }
        return redirect()->back();
    }




}
