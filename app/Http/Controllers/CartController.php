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

        $id = (int) $product->id;
        $cart = Session::get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['count']++;
        }
        else {
            $cart[$id] = ['count' => 1];
        }
        Session::put('cart', $cart);
        return redirect()->back();
    }




}
