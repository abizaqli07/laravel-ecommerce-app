<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
// 	return view('welcome');
// });

Auth::routes();

Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
	Route::get('/', 'index');
	Route::get('/collections', 'categories');
	Route::get('/collections/{category_slug}', 'products');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

	Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

	// Category Routes

	Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
		Route::get('/category', 'index');
		Route::get('/category/create', 'create');
		Route::get('/category/{category}/edit', 'edit');

		Route::post('/category', 'store');
		Route::put('/category/{category}', 'update');
	});

	Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);

	Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
		Route::get('/products', 'index');
		Route::get('/products/create', 'create');
		Route::post('/products', 'store');
		Route::get('/products/{product}/edit', 'edit');
		Route::put('/products/{product}', 'update');
		Route::get('/products/{product_id}/delete', 'destroy');
		Route::get('product-image/{product_image_id}/delete', 'destroyImage');

		Route::post('/product-color/{prod_color_id}', 'updateProdColorQty');
		Route::get('/product-color/{prod_color_id}/delete', 'deleteProdColor');
	});

	Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
		Route::get('/colors', 'index');
		Route::get('/colors/create', 'create');
		Route::post('/colors/create', 'store');
		Route::get('/colors/{color}/edit', 'edit');
		Route::put('/colors/{color_id}', 'update');
		Route::get('/colors/{color_id}/delete', 'destroy');
	});

	Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
		Route::get('/sliders', 'index');
		Route::get('/sliders/create', 'create');
		Route::post('/sliders/create', 'store');
		Route::get('/sliders/{slider}/edit', 'edit');
		Route::put('/sliders/{slider}', 'update');
		Route::get('/sliders/{slider}/delete', 'destroy');
	});
});
