<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;


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
    Route::get('show/{cat}', [CatController::class, 'show'])->name('show');
});

