<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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

Route::get('/dashboard/orders', 
	[OrderController::class, 'index']
)->middleware(['auth'])->name('orders');

Route::get(
	'/dashboard/orders/create',
	[OrderController::class, 'create']
)->middleware(['auth'])->name('orders.create');

Route::post(
	'/dashboard/orders',
	[OrderController::class, 'store']
)->middleware(['auth'])->name('orders.store');




Route::get('/dashboard/settings', function () {
    return view('settings');
})->middleware(['auth'])->name('settings');



Route::get('/dashboard/form-editor', function () {
    return view('form-editor');
})->middleware(['auth'])->name('form-editor');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
