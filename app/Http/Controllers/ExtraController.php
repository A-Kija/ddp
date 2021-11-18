<?php

namespace App\Http\Controllers;

use App\Models\Extra;
use Illuminate\Http\Request;
use App\Services\PhotoHandleService;

class ExtraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $extras = Extra::all();
        return view('back.extra.index', [
            'extras' => $extras,
        ]);
    }

    public function create()
    {
        return view('back.extra.create');
    }

    public function store(Request $request, PhotoHandleService $photoHandler)
    {
        $extra = new Extra;
        // $photoHandler->config('extra');
        $photoHandler->handlePhoto($request, $extra);
        $extra->title = $request->extra_title;
        $extra->price_s = $request->extra_price_s;
        $extra->price_m = $request->extra_price_m;
        $extra->price_l = $request->extra_price_l;
        $extra->save();
        return redirect()
        ->route('extra.index')
        ->with('success_message', 'OK. New extra was created.');;
    }

    public function edit(Request $request, Extra $extra)
    {
        return view('back.extra.edit', [
            'extra' => $extra,
         ]);
    }

    public function update(Request $request, Extra $extra, PhotoHandleService $photoHandler)
    {
        // $photoHandler->config('extra');
        $photoHandler->handlePhoto($request, $extra, 'edit');
        $extra->title = $request->extra_title;
        $extra->price_s = $request->extra_price_s;
        $extra->price_m = $request->extra_price_m;
        $extra->price_l = $request->extra_price_l;
        $extra->save();
        return redirect()
        ->route('extra.index')
        ->with('success_message', 'OK. The extra was edited.');
    }

    public function destroy(Extra $extra, PhotoHandleService $photoHandler)
    {
        // if ($extra->getBooks->count()) {
        //     return redirect()
        //     ->back()
        //     ->with('info_message', 'Can not delete the extra, because he has books.');
        // }
        // $photoHandler->config('extra');
        $photoHandler->deleteOldPhoto($extra);
        $extra->delete();
        return redirect()
        ->route('extra.index')
        ->with('success_message', 'OK. The extra was deleted.');
    }
}
