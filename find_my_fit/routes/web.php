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
    return view('welcome');
});


require __DIR__.'/auth.php';

Route::get('store_image', [StoreImageController::class, 'index']);

Route::post('store_image/insert_image', [StoreImageController::class, 'insert_image']);

Route::get('store_image/fetch_image/{id}', [StoreImageController::class, 'fetch_image']);

Route::get('/wardrobe', 'App\Http\Controllers\WardrobeController@index')->middleware(['auth', 'verified'])->name('wardrobe');

Route::get('/outfit_generation', function () {
    return view('outfit_generation');
});

Route::get('/generated_outfit', [App\Http\Controllers\OutfitGenerationController::class, 'basic_outfit']) -> name('generate_outfit');

require __DIR__.'/auth.php';

