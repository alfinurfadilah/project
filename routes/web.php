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
    Route::post('/item/update/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('item.update');
    Route::delete('/item/delete/{id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('item.delete');
    Route::get('/item/show/{id}', [App\Http\Controllers\ItemController::class, 'show'])->name('item.show');
    Route::get('/item/showAturStock/{id}', [App\Http\Controllers\ItemController::class, 'showAturStock'])->name('item.showAturStock');
    Route::post('/item/updateStock', [App\Http\Controllers\ItemController::class, 'updateStock'])->name('item.updateStock');
    Route::get('/item/getCategories', [App\Http\Controllers\ItemController::class, 'getCategories'])->name('item.getCategories');
    Route::get('/item/getItemTypes/{id}', [App\Http\Controllers\ItemController::class, 'getItemTypes'])->name('item.getItemTypes');

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

    Route::get('/transactionItem', [App\Http\Controllers\TransactionItemController::class, 'index'])->name('transactionItem.index');
    Route::get('/transactionHistory', [App\Http\Controllers\TransactionItemController::class, 'history'])->name('transactionItem.history');
    Route::get('/transactionHistory/detail/{id}', [App\Http\Controllers\TransactionItemController::class, 'detail'])->name('transactionItem.detail');
    Route::post('/transactionItem/store', [App\Http\Controllers\TransactionItemController::class, 'store'])->name('transactionItem.store');
    Route::post('/transactionItem/addCart', [App\Http\Controllers\TransactionItemController::class, 'addCart'])->name('transactionItem.addCart');
    Route::post('/transactionItem/increaseCart', [App\Http\Controllers\TransactionItemController::class, 'increaseCart'])->name('transactionItem.increaseCart');
    Route::post('/transactionItem/decreaseCart', [App\Http\Controllers\TransactionItemController::class, 'decreaseCart'])->name('transactionItem.decreaseCart');
    Route::post('/transactionItem/addDiscount', [App\Http\Controllers\TransactionItemController::class, 'addDiscount'])->name('transactionItem.addDiscount');
    Route::post('/transactionItem/removeDiscount', [App\Http\Controllers\TransactionItemController::class, 'removeDiscount'])->name('transactionItem.removeDiscount');
    Route::post('/transactionItem/addPPN', [App\Http\Controllers\TransactionItemController::class, 'addPPN'])->name('transactionItem.addPPN');
    Route::post('/transactionItem/removePPN', [App\Http\Controllers\TransactionItemController::class, 'removePPN'])->name('transactionItem.removePPN');

    Route::get('/itemReceiving', [App\Http\Controllers\ItemReceivingController::class, 'index'])->name('itemReceiving.index');
    Route::get('/itemReceiving/create', [App\Http\Controllers\ItemReceivingController::class, 'create'])->name('itemReceiving.create');
    Route::post('/itemReceiving/store', [App\Http\Controllers\ItemReceivingController::class, 'store'])->name('itemReceiving.store');

    Route::get('/reporting/laporanPenjualan', [App\Http\Controllers\ReportingController::class, 'laporanPenjualan'])->name('reporting.laporanPenjualan');
    Route::get('/reporting/laporanTransaksiStock', [App\Http\Controllers\ReportingController::class, 'laporanTransaksiStock'])->name('reporting.laporanTransaksiStock');

    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/update', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');


    Route::get('/datacalonpelanggan', [App\Http\Controllers\DataCalonPelangganController::class, 'index'])->name('datacalonpelanggan.index');
    Route::get('/datacalonpelanggan/create', [App\Http\Controllers\DataCalonPelangganController::class, 'create'])->name('datacalonpelanggan.create');
    Route::post('/datacalonpelanggan', [App\Http\Controllers\DataCalonPelangganController::class, 'store'])->name('datacalonpelanggan.store');
    Route::get('/datacalonpelanggan/edit/{id}', [App\Http\Controllers\DataCalonPelangganController::class, 'edit'])->name('datacalonpelanggan.edit');
    Route::post('/datacalonpelanggan/update', [App\Http\Controllers\DataCalonPelangganController::class, 'update'])->name('datacalonpelanggan.update');
    Route::delete('/datacalonpelanggan/delete/{id}', [App\Http\Controllers\DataCalonPelangganController::class, 'destroy'])->name('datacalonpelanggan.delete');

});
