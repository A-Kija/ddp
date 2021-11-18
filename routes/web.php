<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PizzaSizeController;
use App\Http\Controllers\ExtraController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('categories')->name('cat.')->group(function() {
    Route::get('', [CatController::class, 'index'])->name('index');
    Route::get('create', [CatController::class, 'create'])->name('create');
    Route::post('store', [CatController::class, 'store'])->name('store');
    Route::get('edit/{cat}', [CatController::class, 'edit'])->name('edit');
    Route::post('update/{cat}', [CatController::class, 'update'])->name('update');
    Route::post('delete/{cat}', [CatController::class, 'destroy'])->name('destroy');
});

Route::prefix('tags')->name('tag.')->group(function() {
    Route::get('', [TagController::class, 'index'])->name('index');
    Route::get('create', [TagController::class, 'create'])->name('create');
    Route::post('store', [TagController::class, 'store'])->name('store');
    Route::get('edit/{tag}', [TagController::class, 'edit'])->name('edit');
    Route::post('update/{tag}', [TagController::class, 'update'])->name('update');
    Route::post('delete/{tag}', [TagController::class, 'destroy'])->name('destroy');
});

Route::prefix('pizza-sizes')->name('pizzaSize.')->group(function() {
    Route::get('', [PizzaSizeController::class, 'index'])->name('index');
    Route::get('create', [PizzaSizeController::class, 'create'])->name('create');
    Route::post('store', [PizzaSizeController::class, 'store'])->name('store');
    Route::get('edit/{pizzaSize}', [PizzaSizeController::class, 'edit'])->name('edit');
    Route::post('update/{pizzaSize}', [PizzaSizeController::class, 'update'])->name('update');
    Route::post('delete/{pizzaSize}', [PizzaSizeController::class, 'destroy'])->name('destroy');
});



Route::prefix('extras')->name('extra.')->group(function() {
    Route::get('', [ExtraController::class, 'index'])->name('index');
    Route::get('create', [ExtraController::class, 'create'])->name('create');
    Route::post('store', [ExtraController::class, 'store'])->name('store')->middleware('phconfig:extra');
    Route::get('edit/{extra}', [ExtraController::class, 'edit'])->name('edit');
    Route::post('update/{extra}', [ExtraController::class, 'update'])->name('update')->middleware('phconfig:extra');
    Route::post('delete/{extra}', [ExtraController::class, 'destroy'])->name('destroy')->middleware('phconfig:extra');
});

