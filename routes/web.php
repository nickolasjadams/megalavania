<?php

use App\Facades\AuthX as Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;

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

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

/**
 * Route for HOME constant found in App/Providers/RouteServiceProvider
 * Redirects to user's business slug after login.
 */
Route::get('/business', function() {
	return redirect(Auth::slug());
});

Route::get('/{business_name_slug}',
	[UserController::class, 'index']
)->middleware(['auth', 'biz.auth'])->name('users');

Route::get('/{business_name_slug}/orders',
	[OrderController::class, 'index']
)->middleware(['auth', 'biz.auth'])->name('orders');

Route::get(
	'/{business_name_slug}/orders/create',
	[OrderController::class, 'create']
)->middleware(['auth', 'biz.auth'])->name('orders.create');

Route::post(
	'/{business_name_slug}/orders',
	[OrderController::class, 'store']
)->middleware(['auth', 'biz.auth'])->name('orders.store');


/**
 * Routes for brands
 */

Route::get(
	'/{business_name_slug}/brands',
	[BrandController::class, 'index']
)->middleware(['auth'])->name('brands');

Route::get(
	'/{business_name_slug}/brands/create',
	[BrandController::class, 'create']
)->middleware(['auth'])->name('brands.create');

Route::post(
	'/{business_name_slug}/brands',
	[BrandController::class, 'store']
)->middleware(['auth'])->name('brands.store');


Route::get('/{business_name_slug}/settings', function () {
    return view('settings');
})->middleware(['auth', 'biz.auth'])->name('settings');



Route::get('/{business_name_slug}/form-editor', function () {
    return view('form-editor');
})->middleware(['auth', 'biz.auth'])->name('form-editor');





