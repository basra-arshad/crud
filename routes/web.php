<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxCrudControlle;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/create', function () {
    return view('product.create');
});
Route::POST('/product/store',[AjaxCrudControlle::class,'store'] )
->name('product.store');
Route::get('/index',[AjaxCrudControlle::class,'index'] )->name('product.index');
Route::POST('/edite',[AjaxCrudControlle::class,'edit'] )->name('product.edit');
Route::POST('/delete_',[AjaxCrudControlle::class,'delete_'] )->name('product.delete_');
Route::POST('/product/update',[AjaxCrudControlle::class,'update'] )
->name('product.update');
Route::POST('/indexx',[AjaxCrudControlle::class,'get_data'] )->name('product.get_data');

