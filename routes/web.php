<?php

use App\Http\Controllers\ProduitCommandeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
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

//Route::get('/', function () {
//    return view('layaout.test');
//});
Route::get('/', function () {
    return view('admin.categories.form');
});

Route::resources([
    'users' => UserController::class,
    'stocks' => StockController::class,
    'produits'=>ProduitController::class,
    'produitcommandes'=>ProduitCommandeController::class,
    'preferences'=>\App\Http\Controllers\PreferenceController::class,
    'paniers'=>\App\Http\Controllers\PanierController::class,
    'notifications'=>\App\Http\Controllers\NotificationController::class,
    'commandes'=>\App\Http\Controllers\CommandeController::class,
    'categories'=>\App\Http\Controllers\CategorieController::class,

  ]);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
