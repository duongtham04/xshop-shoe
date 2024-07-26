<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\CategoryAdminController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\Auth\ProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

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
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/products/category/{category_id}', [ProductController::class, 'ProductByCategory'])->name('product_by_category');
Route::get('/search', [ProductController::class, 'search'])->name('product.search');

Route::get('/history', [ProductController::class, 'history'])->name('history');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('/forgot', [AccountController::class, 'forgot'])->name('forgotpassword');
Route::get('/reset', [AccountController::class, 'reset'])->name('resetpassword');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');

Route::get('/detailproduct/{id}', [ProductController::class, 'detailproduct'])->name('detail_product');
//CART
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/add', [CartController::class, 'addTOCart'])->name('addToCart');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeCart'])->name('removeCart');

Route::get('/cartDetail', [CartController::class, 'cartDetail'])->name('cartDetail');
Route::post('/payment', [CartController::class, 'payment'])->name('payment');

//HISTORY
Route::get('/history', [CartController::class, 'orderhistory'])->name('orderhistory');
Route::get('/history_detail/{id}', [CartController::class, 'detailOrder'])->name('history_detail');

Route::get('/admin', [AdminController::class, 'index'])->name('admin/admin');
Route::get('/useradmin', [AdminController::class, 'useradmin'])->name('admin/useradmin');
Route::get('/comment', [AdminController::class, 'comment'])->name('admin/comment');

Route::get('/productadmin', [ProductAdminController::class, 'index'])->name('admin.productadmin');
//CREATE PRODUCT
Route::get('/product/create', [ProductAdminController::class, 'create'])->name('products.create');
Route::post('/products', [ProductAdminController::class, 'store'])->name('products.store');
//DELETE PRODUCT
Route::delete('/products/{id}', [ProductAdminController::class, 'destroy'])->name('products.destroy');
//UPDATE PRODUCT
Route::get('/products/{id}/edit', [ProductAdminController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductAdminController::class, 'update'])->name('products.update');

Route::get('/searchproductadmin', [ProductAdminController::class, 'searchpdadmin'])->name('productadmin.search');


Route::get('/categoryadmin', [CategoryAdminController::class, 'index'])->name('admin.categoryadmin');
Route::get('/category_detailadmin/{id}', [CategoryAdminController::class, 'Category_detailadmin'])->name('admin.category_detailadmin');
//CREATE CATEGORIES
Route::get('/category/create', [CategoryAdminController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryAdminController::class, 'store'])->name('categories.store');
//DELETE CATEGORIES
Route::delete('/categories/{id}', [CategoryAdminController::class, 'destroy'])->name('categories.destroy');
//UPDATE CATEGORIES
Route::get('/categories/{id}/edit', [CategoryAdminController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryAdminController::class, 'update'])->name('categories.update');


//USER ADMIN
Route::get('/useradmin', [UserAdminController::class, 'ShowUserAmin'])->name('admin.useradmin');
//CREATE USERS
Route::get('/user/create', [UserAdminController::class, 'create'])->name('user.create');
Route::post('/user', [UserAdminController::class, 'store'])->name('user.store');
//UPDATE USERS
Route::get('/user/{id}/edit', [UserAdminController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserAdminController::class, 'update'])->name('user.update');

//LOCK UNLOCK USER
Route::get('/users/lock/{id}', [UserAdminController::class, 'lockUser'])->name('lockUser');
Route::get('/users/unlock/{id}', [UserAdminController::class, 'unlockUser'])->name('unlockUser');


//ORDER ADMIN
Route::get('/orderadmin', [AdminController::class, 'OrderAdmin'])->name('admin.orderadmin');
Route::patch('/orderadmin/{id}/status', [AdminController::class, 'updateStatus'])->name('update_order_status');
Route::get('/order_detailadmin/{id}', [AdminController::class, 'OrderDetailAdmin'])->name('admin.order_detailadmin');

//RESET
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');


Auth::routes();

