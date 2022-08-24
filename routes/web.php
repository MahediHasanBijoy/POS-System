<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BranchController;
use App\Http\Controllers\Backend\ProductController;

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
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');

});