<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BranchController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\PurchaseController;
use App\Http\Controllers\Backend\SaleController;

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

// Admin
Route::get('/admin', function () {
    return view('backend.dashboard');
})->name('dashboard');


// Branch routes
Route::group(['prefix' => '/branch'], function() {
    Route::get('/add', [BranchController::class, 'add'])->name('branch.add');
    Route::post('/store', [BranchController::class, 'store'])->name('branch.store');
    Route::get('/manage', [BranchController::class, 'manage'])->name('branch.manage');
    Route::get('/destroy/{id}', [BranchController::class, 'destroy'])->name('branch.destroy');
    Route::get('/edit/{id}', [BranchController::class, 'edit'])->name('branch.edit');
    Route::post('/update/{id}', [BranchController::class, 'update'])->name('branch.update');

});

// Product routes
Route::group(['prefix' => '/product'], function() {
    Route::get('/manage', [ProductController::class, 'manage'])->name('product.manage');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/show', [ProductController::class, 'show'])->name('product.show');
    Route::get('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/edit/{id}', [ProductController::class, 'edit']);
    Route::post('/update/{id}', [ProductController::class, 'update']);

});

// Purchase routes
Route::group(['prefix' => '/purchase'], function() {
    Route::get('/manage', [PurchaseController::class, 'manage'])->name('purchase.manage');
    Route::post('/store', [PurchaseController::class, 'store'])->name('purchase.store');
    Route::get('/show', [PurchaseController::class, 'show'])->name('purchase.show');
    Route::get('/destroy/{id}', [PurchaseController::class, 'destroy'])->name('purchase.destroy');
    Route::get('/edit/{id}', [PurchaseController::class, 'edit']);
    Route::post('/update/{id}', [PurchaseController::class, 'update']);
    Route::get('/find/{id}/{br_id}', [PurchaseController::class, 'find']);
    Route::get('/stock', [PurchaseController::class, 'stock'])->name('stock');
});


// Sale routes
Route::group(['prefix' => '/sale'], function() {
    Route::get('/add', [SaleController::class, 'index'])->name('add.sale');
    Route::get('/find_price/{id}', [SaleController::class,'findPrice']);
    Route::post('/store', [SaleController::class, 'store']);
    Route::get('/productshow/{invoice}', [SaleController::class, 'productshow']);
    Route::get('/destroy/{id}', [SaleController::class, 'destroy'])->name('sale.destroy');
    Route::get('/print/{invoice}', [SaleController::class, 'print']);
});