<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');


    // FORM REQUESTS

    Route::get('/category', App\Livewire\Category::class)->name('category.index');
    Route::get('/subcategory', App\Livewire\SubCatagory::class)->name('subcategory.index');
    Route::get('/product', App\Livewire\Product::class)->name('product.index');
    Route::get('/featuredproduct', App\Livewire\HomeProduct::class)->name('featuredproduct.index');
    Route::get('/vieworders', App\Livewire\ViewOrder::class)->name('vieworders.index');
});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [App\Http\Controllers\UserProfileController::class, 'index'])->name('profile');
    Route::post('/profile/{id}', [App\Http\Controllers\UserProfileController::class, 'addUserInfo'])->name('profile.userinfo');
    Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');

    Route::post('/placeorder', [App\Http\Controllers\OrderController::class, 'index'])->name('placeorder');

    Route::get('/print', [App\Http\Controllers\InvoiceController::class, 'download'])->name('print');

});

Route::get('/success', [App\Http\Controllers\OrderController::class, 'success'])->name('checkout.success');
Route::get('/unsuccess', [App\Http\Controllers\OrderController::class, 'cancel'])->name('checkout.cancel');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/viewproduct', [App\Http\Controllers\SingleProductController::class, 'index'])->name('viewproduct');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'seeCart']);


//cart Request
Route::post('/addtocart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('addtocart');
Route::post('/removecart-item', [App\Http\Controllers\CartController::class, 'removeFromCart']);
Route::post('/updatecart', [App\Http\Controllers\CartController::class, 'updateCart']);
Route::post('/update-cart-button', [App\Http\Controllers\CartController::class, 'updateCartButton']);

//Subscribe Requests
Route::post('/subscribe', [SubscriberController::class, 'subscribe'])->name('subcribe');