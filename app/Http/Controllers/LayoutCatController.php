<?php

namespace App\Http\Controllers;

use App\Models\LayoutCat;
use App\Models\Cat;
use Illuminate\Http\Request;

class LayoutCatController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $layoutCats = LayoutCat::orderBy('place', 'DESC')->get();
        return view('back.layoutCat.index', ['layoutCats' => $layoutCats]);
    }

    public function create()
    {
        $cats = Cat::all();
        return view('back.layoutCat.create', [
            'cats' => $cats
        ]);
    }

    public function store(Request $request)
    {
        $layoutCat = new LayoutCat;
        $layoutCat->cat_id = $request->layout_cat_id;
        $layoutCat->place = 0;
        $layoutCat->save();// tik nuo cia atsiranda modelyje ID
        $layoutCat->place = $layoutCat->id;
        $layoutCat->save();
        return redirect()->route('layoutCat.index')->with('success_message', 'New layoutCat has arrived.');
    }





    public function destroy(LayoutCat $layoutCat)
    {
        // if ($layoutCat->layoutCatHasOutfits->count()){
        //     return redirect()->back()->with('info_message', 'There is job to do. Can\'t delete.');
        // }
        $layoutCat->delete();
        return redirect()->route('layoutCat.index')->with('success_message', 'LayoutCat gone.');
    }
}
