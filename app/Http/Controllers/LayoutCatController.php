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
        $usedCats = LayoutCat::all()->pluck('cat_id')->all();

        return view('back.layoutCat.create', [
            'cats' => $cats,
            'usedCats' => $usedCats
        ]);
    }

    public function store(Request $request)
    {
        
        $usedCats = LayoutCat::all()->pluck('cat_id')->all();
        if (in_array($request->layout_cat_id, $usedCats)) {
            $request->flash();
            return redirect()->back()->with('info_message', 'The cat already added.');
        }
       
        
        $layoutCat = new LayoutCat;
        $layoutCat->cat_id = $request->layout_cat_id;
        $layoutCat->place = 0;
        $layoutCat->save();// tik nuo cia atsiranda modelyje ID
        $layoutCat->place = $layoutCat->id;
        $layoutCat->save();
        return redirect()->route('layoutCat.index')->with('success_message', 'New layoutCat has arrived.');
    }


    public function up(LayoutCat $layoutCat)
    {
        $upLayout = LayoutCat::orderBy('place', 'ASC')
        ->where('place', '>', $layoutCat->place)
        ->first();

        if (null !== $upLayout) {
            $place = $layoutCat->place;
            $layoutCat->place = $upLayout->place;
            $upLayout->place = $place;
            $layoutCat->save();
            $upLayout->save();
            return redirect()->back()->with('success_message', 'Layout was changed.');
        }
        return redirect()->back()->with('info_message', 'This category already is in the Layout top position.');
    }

    public function down(LayoutCat $layoutCat)
    {
        $downLayout = LayoutCat::orderBy('place', 'DESC')
        ->where('place', '<', $layoutCat->place)
        ->first();

        if (null !== $downLayout) {
            $place = $layoutCat->place;
            $layoutCat->place = $downLayout->place;
            $downLayout->place = $place;
            $layoutCat->save();
            $downLayout->save();
            return redirect()->back()->with('success_message', 'Layout was changed.');
        }
        return redirect()->back()->with('info_message', 'This category already is in the Layout bottom position.');
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
