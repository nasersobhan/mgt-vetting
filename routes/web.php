<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\CategoriesController;
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

Auth::routes();


Route::group(['middleware' => 'auth'], function() {

    Route::get('/people/export',[App\Http\Controllers\PeopleController::class, 'export'])->name('people.export');
    Route::resource('people', PeopleController::class);

    Route::get('/people/editCase/{id}', [App\Http\Controllers\PeopleController::class, 'editCase'])->name('people.editCase');
    Route::post('/people/editCase/{id}', [App\Http\Controllers\PeopleController::class, 'editCaseSave'])->name('people.editCaseSave');
    Route::get('/people/editStep/{id}', [App\Http\Controllers\PeopleController::class, 'editStep'])->name('people.editStep');







    // Route::post('/people/editStep/{id}', [App\Http\Controllers\PeopleController::class, 'editCaseSave'])->name('people.editCaseSave');
    Route::prefix();


    Route::prefix('admin')->group(function () {

        Route::group(['middleware' => ['auth', 'admin']], function() {
            Route::resource('categories', CategoriesController::class);
        });
       
    });


    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});