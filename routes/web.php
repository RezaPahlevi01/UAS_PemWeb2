<?php

use App\Http\Controllers\RestorantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopsisController;
use App\Http\Controllers\CalculateController;



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/submit', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('forgot-password');
Route::post('/forgot-password-act', [AuthController::class, 'forgot_password_act']);
 
Route::get('/validasi-forgot-password/{token}', [AuthController::class, 'validasi_forgot_password'])->name('validasi-forgot-password');
Route::post('/validasi-forgot-password-act', [AuthController::class, 'validasi_forgot_password_act'])->name('validasi-forgot-password-act');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/', function () {
    return view('landing');
});




// Results
// Route::get('/results', [ResultController::class, 'index'])->name('results');

// Route::get('/dashboard', function () {
//      return view('dashboard');
//  })->middleware(['auth', 'verified'])->name('dashboard');

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
// Route::get('restorant/{restorant}/edit', [RestorantController::class, 'edit'])->name('restorant.edit');



Route::resource('kriteria', KriteriaController::class);

Route::get('/topsis', [TopsisController::class, 'index'])->name('topsis.index');
Route::post('/topsis/calculate', [TopsisController::class, 'calculate'])->name('topsis.calculate');


Route::resource('profile', ProfileController::class);

// Route::get('kriteria/{id}/edit', 'KriteriaController@edit')->name('kriteria.edit');
// Route::put('kriteria/{id}', 'KriteriaController@update')->name('kriteria.update');

 Route::controller(GoogleController::class)->group(function(){
     Route::get('auth/google', 'redirectGoogle')->name('auth.google');
     Route::get('auth/google/callback', 'handleGoogleCallback');
 });

 

 Route::post('logout', [LogoutController::class, 'logout'])->name('logout');


 Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
 Route::get('/penilaian/create', [PenilaianController::class, 'create'])->name('penilaian.create');
 Route::post('/penilaian', [PenilaianController::class, 'store'])->name('penilaian.store');
 Route::get('/penilaian/{id}/edit', [PenilaianController::class, 'getForms'])->name('penilaian.edit');
 Route::put('/penilaian/update', [PenilaianController::class, 'update'])->name('penilaian.update');
 Route::delete('/penilaian/{id}', [PenilaianController::class, 'destroy'])->name('penilaian.destroy');
 Route::get('/penilaian/calculate', [PenilaianController::class, 'calculate'])->name('penilaian.calculate');
 
 Route::get('/perhitungan/topsis', [CalculateController::class, 'topsis'])->name('perhitungan.topsis');




//  Route::post('/profile', [ProfileController::class, 'index'])->name('profile');
//  Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

 
// Route::get('auth/google', [GoogleController::class, 'redirectGoogle']);
// Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);



// Route::get('/', [TopsisController::class, 'index'])->name('index');
// Route::get('/kriteria', [TopsisController::class, 'kriteria'])->name('kriteria');
// Route::get('/alternatif', [TopsisController::class, 'alternatif'])->name('alternatif');
// Route::get('/nilmat', [TopsisController::class, 'nilmat'])->name('nilmat');
// Route::post('/tambahnilmat', [TopsisController::class, 'tambahNilmat'])->name('tambahnilmat');
// Route::get('/hastop', [TopsisController::class, 'hastop'])->name('hastop');


// Route::get('restorant/', function () {
//     return view('restorant.index');
// });
// Route::get('restorant/index', function () {
//     $restorant = Restorant::all(); // Mengambil semua data restoran dari model Restorant (pastikan model dan tabel sudah ada)
//     return view('restorant.index', ['restorants' => $restorant]);
// });
