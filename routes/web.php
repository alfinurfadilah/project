<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () { 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/item', [App\Http\Controllers\ItemController::class, 'index'])->name('item.index');
    Route::get('/item/create', [App\Http\Controllers\ItemController::class, 'create'])->name('item.create');

    Route::get('/itemType', [App\Http\Controllers\ItemTypeController::class, 'index'])->name('itemType.index');
    Route::get('/itemType/create', [App\Http\Controllers\ItemTypeController::class, 'create'])->name('itemType.create');
    Route::post('/itemType/store', [App\Http\Controllers\ItemTypeController::class, 'store'])->name('itemType.store');
    Route::get('/itemType/edit/{id}', [App\Http\Controllers\ItemTypeController::class, 'edit'])->name('itemType.edit');
    Route::post('/itemType/update', [App\Http\Controllers\ItemTypeController::class, 'update'])->name('itemType.update');
    Route::delete('/itemType/delete/{id}', [App\Http\Controllers\ItemTypeController::class, 'destroy'])->name('itemType.delete');

    Route::get('/uom', [App\Http\Controllers\UomController::class, 'index'])->name('uom.index');
    Route::get('/uom/create', [App\Http\Controllers\UomController::class, 'create'])->name('uom.create');
    Route::post('/uom/store', [App\Http\Controllers\UomController::class, 'store'])->name('uom.store');
    Route::get('/uom/edit/{id}', [App\Http\Controllers\UomController::class, 'edit'])->name('uom.edit');
    Route::post('/uom/update', [App\Http\Controllers\UomController::class, 'update'])->name('uom.update');
    Route::delete('/uom/delete/{id}', [App\Http\Controllers\UomController::class, 'destroy'])->name('uom.delete');

    Route::get('/item_type', [App\Http\Controllers\UomController::class, 'index'])->name('item_type.index');
    Route::get('/item_type/create', [App\Http\Controllers\UomController::class, 'create'])->name('item_type.create');

    Route::get('/item_price', [App\Http\Controllers\UomController::class, 'index'])->name('item_price.index');
    Route::get('/item_price/create', [App\Http\Controllers\UomController::class, 'create'])->name('item_price.create');

    Route::get('/item_qty', [App\Http\Controllers\UomController::class, 'index'])->name('item_qty.index');
    Route::get('/item_qty/create', [App\Http\Controllers\UomController::class, 'create'])->name('item_qty.create');
});
