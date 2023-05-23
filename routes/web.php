<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/

//Test routes

Route::get('/test', function () {
    return view('test.page_section');
});

Route::domain('{domain}.' . env('APP_URL'))->group(function () {

    //Home routes
    Route::get('/', [HomeController::class, 'index'])->name('Home');
    Route::get('/index.html', [HomeController::class, 'index'])->name('Home');

    //Brands routes
    Route::get('/store/brands', [BrandController::class, 'index'])->name('Brands');
    Route::get('/store/brand/{slug}', [BrandController::class, 'dbrand'])->name('Brands-page');

    //Category routes
    Route::get('/store/categories', [CategoryController::class, 'index'])->name('Categories');
    Route::get('/store/{slug}', [CategoryController::class, 'dcategory'])->name('Categories-page');

    //Contacts routes
    Route::get('/contacts', [ContactsController::class, 'contacts'])->name('Contact us');

    //Product routes
    Route::get('/store', [ProductController::class, 'search'])->name('Store');
    Route::get('/store/{category}/{product}.html', [ProductController::class, 'dproduct'])->name('Product-page');

    //MAil routes
    Route::post('/mail', [MailController::class, 'send'])->name('Mail');
});

//Home routes
Route::get('/', [HomeController::class, 'index'])->name('Home');
Route::get('/index.html', [HomeController::class, 'index'])->name('Home');

//Brands routes
Route::get('/store/brands', [BrandController::class, 'index'])->name('Brands');
Route::get('/store/brand/{slug}', [BrandController::class, 'brand'])->name('Brands-page');

//Category routes
Route::get('/store/categories', [CategoryController::class, 'index'])->name('Categories');
Route::get('/store/{slug}', [CategoryController::class, 'category'])->name('Categories-page');

//Contacts routes
Route::get('/contacts', [ContactsController::class, 'contacts'])->name('Contact us');

//Product routes
Route::get('/store', [ProductController::class, 'search'])->name('Store');
Route::get('/store/{category}/{product}.html', [ProductController::class, 'product'])->name('Product-page');

//MAil routes
Route::post('/mail', [MailController::class, 'send'])->name('Mail');

//Voyager routes
Route::group(['prefix' => 'admin'], function () { Voyager::routes(); });
