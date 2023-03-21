<?php

use App\Http\Controllers\BackEnd\AdminController;
use App\Http\Controllers\BackEnd\ProductController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\OrderController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/', FrontEndController::class);

Route::post('admin/order/actions', [OrderController::class, 'actions'])->name('order.actions');
Route::get('admin/order/padding', [OrderController::class, 'padding'])->name('order.padding');
Route::get('admin/order/complete', [OrderController::class, 'complete'])->name('order.complete');
Route::get('admin/order/rejected', [OrderController::class, 'rejected'])->name('order.rejected');
Route::resource('admin/orders', OrderController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::resource('dashboard', AdminController::class);
    Route::resource('admin/product', ProductController::class);
});
