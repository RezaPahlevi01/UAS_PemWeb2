<?php

use App\Http\Controllers\RestorantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Auth\LogoutController;


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
     return view('dashboard');
 })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/signin', function () {
    return view('auth.login');
});
Route::get('/signup', function () {
    return view('auth.signup');
});

Route::resource('restorant', RestorantController::class);
// Route::put('restorant/{id}', [RestorantController::class, 'update'])->name('restorant.update');
// Route::put('restorant/{id}/edit', [RestorantController::class, 'edit'])->name('restorant.edit');

Route::resource('kriteria', KriteriaController::class);
// Route::resource('kriteria', 'KriteriaController');

// Route::get('kriteria/{id}/edit', 'KriteriaController@edit')->name('kriteria.edit');
// Route::put('kriteria/{id}', 'KriteriaController@update')->name('kriteria.update');

 Route::controller(GoogleController::class)->group(function(){
     Route::get('auth/google', 'redirectGoogle')->name('auth.google');
     Route::get('auth/google/callback', 'handleGoogleCallback');
 });



 Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
 
// Route::get('auth/google', [GoogleController::class, 'redirectGoogle']);
// Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


// Route::get('restorant/', function () {
//     return view('restorant.index');
// });
// Route::get('restorant/index', function () {
//     $restorant = Restorant::all(); // Mengambil semua data restoran dari model Restorant (pastikan model dan tabel sudah ada)
//     return view('restorant.index', ['restorants' => $restorant]);
// });
