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
    Route::post('/item/store', [App\Http\Controllers\ItemController::class, 'store'])->name('item.store');
    Route::get('/item/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit'])->name('item.edit');
    Route::post('/item/update', [App\Http\Controllers\ItemController::class, 'update'])->name('item.update');
    Route::post('/item/delete/{id}', [App\Http\Controllers\ItemController::class, 'delete'])->name('item.delete');

    Route::get('/itemHistory', [App\Http\Controllers\ItemHistoryController::class, 'index'])->name('itemHistory.index');
    Route::get('/itemHistory/show/{id}', [App\Http\Controllers\ItemHistoryController::class, 'show'])->name('itemHistory.show');

    Route::get('/itemCategoryType', [App\Http\Controllers\ItemCategoryTypeController::class, 'index'])->name('itemCategoryType.index');
    Route::get('/itemCategoryType/create', [App\Http\Controllers\ItemCategoryTypeController::class, 'create'])->name('itemCategoryType.create');
    Route::post('/itemCategoryType/store', [App\Http\Controllers\ItemCategoryTypeController::class, 'store'])->name('itemCategoryType.store');
    Route::get('/itemCategoryType/edit/{id}', [App\Http\Controllers\ItemCategoryTypeController::class, 'edit'])->name('itemCategoryType.edit');
    Route::post('/itemCategoryType/update', [App\Http\Controllers\ItemCategoryTypeController::class, 'update'])->name('itemCategoryType.update');
    Route::delete('/itemCategoryType/delete/{id}', [App\Http\Controllers\ItemCategoryTypeController::class, 'destroy'])->name('itemCategoryType.delete');
    
    Route::get('/itemCategory', [App\Http\Controllers\ItemCategoriesController::class, 'index'])->name('itemCategory.index');
    Route::get('/itemCategory/create', [App\Http\Controllers\ItemCategoriesController::class, 'create'])->name('itemCategory.create');
    Route::post('/itemCategory/store', [App\Http\Controllers\ItemCategoriesController::class, 'store'])->name('itemCategory.store');
    Route::get('/itemCategory/edit/{id}', [App\Http\Controllers\ItemCategoriesController::class, 'edit'])->name('itemCategory.edit');
    Route::post('/itemCategory/update', [App\Http\Controllers\ItemCategoriesController::class, 'update'])->name('itemCategory.update');
    Route::delete('/itemCategory/delete/{id}', [App\Http\Controllers\ItemCategoriesController::class, 'destroy'])->name('itemCategory.delete');

    Route::get('/itemType', [App\Http\Controllers\ItemTypeController::class, 'index'])->name('itemType.index');
    Route::get('/itemType/create', [App\Http\Controllers\ItemTypeController::class, 'create'])->name('itemType.create');
    Route::post('/itemType/store', [App\Http\Controllers\ItemTypeController::class, 'store'])->name('itemType.store');
    Route::get('/itemType/edit/{id}', [App\Http\Controllers\ItemTypeController::class, 'edit'])->name('itemType.edit');
    Route::post('/itemType/update', [App\Http\Controllers\ItemTypeController::class, 'update'])->name('itemType.update');
    Route::delete('/itemType/delete/{id}', [App\Http\Controllers\ItemTypeController::class, 'destroy'])->name('itemType.delete');

    Route::get('/transactionCategory', [App\Http\Controllers\TransactionCategoryController::class, 'index'])->name('transactionCategory.index');
    Route::get('/transactionCategory/create', [App\Http\Controllers\TransactionCategoryController::class, 'create'])->name('transactionCategory.create');
    Route::post('/transactionCategory/store', [App\Http\Controllers\TransactionCategoryController::class, 'store'])->name('transactionCategory.store');
    Route::get('/transactionCategory/edit/{id}', [App\Http\Controllers\TransactionCategoryController::class, 'edit'])->name('transactionCategory.edit');
    Route::post('/transactionCategory/update', [App\Http\Controllers\TransactionCategoryController::class, 'update'])->name('transactionCategory.update');
    Route::delete('/transactionCategory/delete/{id}', [App\Http\Controllers\TransactionCategoryController::class, 'destroy'])->name('transactionCategory.delete');

    Route::get('/uom', [App\Http\Controllers\UomController::class, 'index'])->name('uom.index');
    Route::get('/uom/create', [App\Http\Controllers\UomController::class, 'create'])->name('uom.create');
    Route::post('/uom/store', [App\Http\Controllers\UomController::class, 'store'])->name('uom.store');
    Route::get('/uom/edit/{id}', [App\Http\Controllers\UomController::class, 'edit'])->name('uom.edit');
    Route::post('/uom/update', [App\Http\Controllers\UomController::class, 'update'])->name('uom.update');
    Route::delete('/uom/delete/{id}', [App\Http\Controllers\UomController::class, 'destroy'])->name('uom.delete');

    Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer/store', [App\Http\Controllers\CustomerController::class, 'store'])->name('customer.store');
    Route::get('/customer/edit/{id}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/customer/update', [App\Http\Controllers\CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/customer/delete/{id}', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('customer.delete');

    Route::get('/supplier', [App\Http\Controllers\SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/supplier/create', [App\Http\Controllers\SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/supplier/store', [App\Http\Controllers\SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/supplier/edit/{id}', [App\Http\Controllers\SupplierController::class, 'edit'])->name('supplier.edit');
    Route::post('/supplier/update', [App\Http\Controllers\SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('/supplier/delete/{id}', [App\Http\Controllers\SupplierController::class, 'destroy'])->name('supplier.delete');

    Route::get('/item_price', [App\Http\Controllers\UomController::class, 'index'])->name('item_price.index');
    Route::get('/item_price/create', [App\Http\Controllers\UomController::class, 'create'])->name('item_price.create');

    Route::get('/item_qty', [App\Http\Controllers\UomController::class, 'index'])->name('item_qty.index');
    Route::get('/item_qty/create', [App\Http\Controllers\UomController::class, 'create'])->name('item_qty.create');
});
