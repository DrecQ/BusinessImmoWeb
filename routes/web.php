<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Models\Property;
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

Route::get('/', [HomeController::class, 'index']);

$idregex = '[0-9]+';
$slugregex = '[0-9a-z\-]+';

Route::get('/biens', [PropertyController::class, 'index'])->name('property.index');
Route::get('/biens/{slug}-{property}', [PropertyController::class, 'show'])->name('property.show')->where([
        'property' => $idregex,
        'slug' => $slugregex
    ]);

//Route pour les contacts 

Route::post('/biens/{property}/contact', [PropertyController::class, 'contact'])->name('property.contact')->where([
    'property' => $idregex,
]);


//Creation de la route pour la page de connexion 

Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::delete('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


//Creation de la route de gestion de la partie administrator

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::resource('property', \App\Http\Controllers\Admin\PropertyController::class)->except(['show']);
 Route::resource('option', \App\Http\Controllers\Admin\OptionController::class)->except(['show']);
});


