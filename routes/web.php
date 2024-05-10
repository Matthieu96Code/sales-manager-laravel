<?php

use App\Livewire\CustomerTable;
use App\Livewire\ProductList;
use App\Livewire\StoreItems;
use App\Livewire\UserTable;
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

Route::get('/', ProductList::class)->name('products');
// Route::get('/products', ProductList::class)->name('products');
Route::get('/stores', StoreItems::class)->name('stores');
Route::get('/customers', CustomerTable::class)->name('customers');
Route::get('/seller', UserTable::class)->name('seller');
// Route::get('/sales', UserTable::class)->name('sales');