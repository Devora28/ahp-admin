<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
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
Route::get('/',[AdminController::class,'index'])->middleware('auth:admin')->name('home');
Route::get('users',[AdminController::class,'usersList'])->middleware('auth:admin')->name('users-list');
Route::get('login',[AuthController::class,'loginPage'])->middleware('guest:admin')->name('login-page');
Route::post('login',[AuthController::class,'login'])->middleware('guest:admin')->name('login');
Route::post('logout',[AuthController::class,'logout'])->middleware('auth:admin')->name('logout');
Route::get('forgot-password', [AuthController::class, 'forgotPasswordPage'])->middleware('guest:admin')->name('forgot-password-page');
Route::post('forgot-password', [AuthController::class, 'sendResetLink'])->middleware('guest:admin')->name('password-email');
Route::get('reset-password/{token}', [AuthController::class, 'resetPasswordPage'])->middleware('guest:admin')->name('reset-password-page');
Route::post('reset-password', [AuthController::class, 'resetPassword'])->middleware('guest:admin')->name('reset-password');
Route::post('delete-user/{id}',[AdminController::class,'deleteUser'])->middleware('auth:admin')->name('delete-user');
Route::post('edit-user/{id}',[AdminController::class,'editUser'])->middleware('auth:admin')->name('edit-user');
Route::get('add-product',[ProductController::class,'addProductPage'])->middleware('auth:admin')->name('add-product-page');
Route::post('add-product',[ProductController::class,'addProduct'])->middleware('auth:admin')->name('add-product');
Route::get('profile/{id}',[AdminController::class,'profilePage'])->middleware('auth:admin')->name('profile-page');
Route::get('edit-profile/{id}',[AdminController::class,'editProfilePage'])->middleware('auth:admin')->name('edit-profile-page');
Route::post('update-password',[AdminController::class,'updatePassword'])->middleware('auth:admin')->name('update-password');
Route::post('update-admin-profile',[AdminController::class,'updateAdminProfile'])->middleware('auth:admin')->name('update-admin-profile');
Route::get('products',[ProductController::class,'productList'])->middleware('auth:admin')->name('products-list');
Route::get('product-details/ahp-{id}/{slug?}',[ProductController::class,'productDetails'])->middleware('auth:admin')->name('product-details');
Route::post('update-product/{id}',[ProductController::class,'updateProduct'])->middleware('auth:admin')->name('update-product');
Route::post('delete-product/{id}',[ProductController::class,'deleteProduct'])->middleware('auth:admin')->name('delete-product');
