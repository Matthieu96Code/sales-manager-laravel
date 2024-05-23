<?php

use App\Livewire\CustomerTable;
use App\Livewire\Dashboard;
use App\Livewire\Login;
use App\Livewire\ProductList;
use App\Livewire\Profile;
use App\Livewire\Register;
use App\Livewire\SaleRecord;
use App\Livewire\StoreItems;
use App\Livewire\SupplyList;
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

Route::middleware('auth')->group(function(){
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/products', ProductList::class)->name('products');
    Route::get('/stores', StoreItems::class)->name('stores');
    Route::get('/sales', SaleRecord::class)->name('sales');
    Route::get('/customers', CustomerTable::class)->name('customers');
    Route::get('/sellers', UserTable::class)->name('sellers');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/supplies', SupplyList::class)->name('supplies');
});
// Route::get('/sales', UserTable::class)->name('sales');

Route::middleware('guest')->group(function(){
    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');
});