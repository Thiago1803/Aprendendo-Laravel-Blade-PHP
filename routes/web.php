<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\ProductsController;

Route::get('/', [ProductsController::class, 'index']);

Route::get('/create', [ProductsController::class, 'create'])->middleware('auth');

Route::get('/produtos/{id}', [ProductsController::class, 'show']);

Route::post('/produtos', [ProductsController::class, 'store']);

Route::get('/produtos/edit/{id}', [ProductsController::class, 'edit'])->middleware('auth');

Route::put('/produtos/update/{id}', [ProductsController::class, 'update'])->middleware('auth');

Route::delete('/produtos/{id}', [ProductsController::class, 'destroy'])->middleware('auth');

Route::post('/produtos/carrinho/{id}', [ProductsController::class, 'insertCart'])->middleware('auth');

Route::get('/dashboard', [ProductsController::class, 'dashboard'])->middleware('auth');