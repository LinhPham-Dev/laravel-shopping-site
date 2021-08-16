<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// Controller
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\OrderController as BackendOrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FacebookController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Auth;

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


// *** FontEnd Route *** \\
Route::get('/home', function () {
    return redirect()->route('home');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/category/{slug?}', [HomeController::class, 'category'])->name('category');

Route::get('/product/{slug}', [HomeController::class, 'product'])->name('product_detail');

Route::prefix('cart')->group(function () {
    // Show all item
    Route::get('/show', [CartController::class, 'show'])->name('cart.show');

    // Add to cart
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');

    // Update cart
    Route::put('/update', [CartController::class, 'update'])->name('cart.update');

    // Remove cart
    Route::get('/remove/{rowId}', [CartController::class, 'remove'])->name('cart.remove');

    // Destroy cart
    Route::get('/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
});

Route::prefix('checkout')->group(function () {

    Route::get('/show', [OrderController::class, 'showCheckoutForm'])->name('checkout')->middleware('auth');

    Route::post('/handler', [OrderController::class, 'checkout'])->name('checkout.handler')->middleware('auth');

    Route::get('/check', [OrderController::class, 'check'])->name('order.check');

    Route::get('/confirm/{token}', [OrderController::class, 'confirmed'])->name('order.confirm');

    Route::get('/failed', [OrderController::class, 'failed'])->name('order.failed');

    Route::get('/complete', [OrderController::class, 'complete'])->name('order.complete');

    Route::get('/history', [OrderController::class, 'orderHistory'])->name('order.history');
});

// Route 404
Route::fallback(function () {
    return view('frontend.pages.error');
});


// Facebook login
Route::get('info-facebook/{facebook}', [FacebookController::class,  'getInfo'])->name('facebook_login');

Route::get('check-facebook/{facebook}', [FacebookController::class,  'checkInfo']);

// Register form
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('user.show_register_form');
Route::post('/register', [UserController::class, 'register'])->name('user.register');

// Login form
Route::get('/login', [UserController::class, 'showLoginForm'])->name('user.show_login_form');
Route::post('/login', [UserController::class, 'login'])->name('user.login');

// Logout form
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');


// *** BackEnd Route *** \\
Route::prefix('admin')->group(function () {
    // Login Route
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.show_login_form');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');

    // Auth:admin
    Route::group(['middleware' => 'admin'], function () {

        // Dashboard
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::redirect('/home', '/');

        // Route Logout
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

        // Route Category
        Route::resource('/categories', CategoryController::class)->except(['create', 'show']);

        // Route Color
        Route::resource('/colors', ColorController::class)->except(['create', 'show']);

        // Route Size
        Route::resource('/sizes', SizeController::class)->except(['create', 'show']);

        // Route Product
        Route::resource('/products', ProductController::class);

        Route::prefix('orders')->group(function () {

            Route::get('/show', [BackendOrderController::class, 'show'])->name('backend.order.show');

            Route::get('/detail/{id}', [BackendOrderController::class, 'detail'])->name('backend.order.detail');

            Route::put('/update/{id}', [BackendOrderController::class, 'update'])->name('backend.order.update');

        });
    });
});
