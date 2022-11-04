<?php
use App\Http\Controllers\StoreImageController;
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

Route::get('/', function () {
    return view('outfit_generation');
});


Route::get('/home', function () {
    return view('home');
})->name('home');

require __DIR__.'/auth.php';

Route::get('store_image', [StoreImageController::class, 'index'])->middleware(['auth', 'verified']);

Route::post('store_image/insert_image', [StoreImageController::class, 'insert_image'])->middleware(['auth', 'verified']);

Route::get('store_image/fetch_image/{id}', [StoreImageController::class, 'fetch_image'])->middleware(['auth', 'verified']);

Route::get('/wardrobe', 'App\Http\Controllers\WardrobeController@index')->middleware(['auth', 'verified'])->name('wardrobe');
Route::get('/account', 'App\Http\Controllers\AccountController@index')->middleware(['auth', 'verified']);

// Route::get('/account', [AccountController::class, 'index'])->middleware(['auth', 'verified']);

Route::get('account/fetch_inner/{id}', [AccountController::class, 'fetch_inner'])->middleware(['auth', 'verified']);

Route::get('account/fetch_outter/{id}', [AccountController::class, 'fetch_outter'])->middleware(['auth', 'verified']);

Route::get('account/fetch_bottom/{id}', [AccountController::class, 'fetch_bottom'])->middleware(['auth', 'verified']);

Route::get('/outfit_generation', function () {
    return view('outfit_generation');
})->middleware(['auth', 'verified'])->name('outfit_generation_page');

Route::get('/generated_outfit', [App\Http\Controllers\OutfitGenerationController::class, 'basic_outfit'])->middleware(['auth', 'verified'])->name('generate_outfit');

Route::get('/get_weather', 'App\Http\Controllers\WeatherController@get_weather')->middleware(['auth', 'verified'])->name('get_weather');
Route::post('/store_weather', 'App\Http\Controllers\WeatherController@store_weather')->middleware(['auth', 'verified'])->name('store_weather');



require __DIR__.'/auth.php';

