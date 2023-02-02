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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/produtos', [App\Http\Controllers\ProdutosController::class, 'index'])->name('list')->middleware('auth');

Route::get('/produtos/new', [App\Http\Controllers\ProdutosController::class, 'new'])->name('form')->middleware('auth');

Route::post('/produtos/add', [App\Http\Controllers\ProdutosController::class, 'add'])->name('add')->middleware('auth');
Route::get('/produtos/{id}/edit', [App\Http\Controllers\ProdutosController::class, 'edit'])->name('edit')->middleware('auth');
Route::post('/produtos/update/{id}', [App\Http\Controllers\ProdutosController::class, 'update'])->name('update')->middleware('auth');
Route::delete('/produtos/delete/{id}', [App\Http\Controllers\ProdutosController::class, 'delete'])->name('delete')->middleware('auth');