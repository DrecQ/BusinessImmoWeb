<?php

use App\Http\Controllers\HomeController;
use App\Models\Property;
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

Route::get('/home', [HomeController::class, 'index']);


//Creation de la route de gestion de la partie administrator

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('property', \App\Http\Controllers\Admin\PropertyController::class)->except(['show']);
 Route::resource('option', \App\Http\Controllers\Admin\OptionController::class)->except(['show']);
});


