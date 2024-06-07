<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrderController; // Tambahkan OrderController
use App\Http\Controllers\PengelolaController;
use App\Http\Controllers\RekapitulasiController;
use App\Http\Controllers\UserBookingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('choose_role');
})->name('choose_role');

Route::post('/select-role', function (\Illuminate\Http\Request $request) {
    $role = $request->input('role');

    if ($role === 'user') {
        return redirect()->route('user.login');
    } elseif ($role === 'pengelola') {
        return redirect()->route('pengelola.login');
    } elseif ($role === 'admin') {
        return redirect()->route('admin.login');
    }

    return redirect()->route('choose_role')->with('error', 'Role not recognized');
})->name('save.role');

// Routes for Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::match(['post', 'get'], 'login', [AdminController::class, 'login'])->name('login');
    Route::get('index', [AdminController::class, 'index'])->name('index');
    Route::get('logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('tambah', [AdminController::class, 'create'])->name('create');

    Route::prefix('lokasi')->name('lokasi.')->group(function () {
        Route::get('tambah', [LokasiController::class, 'create'])->name('create');
        Route::get('/', [LokasiController::class, 'index'])->name('index');
        Route::post('store', [LokasiController::class, 'store'])->name('store');
        Route::get('edit/{id}', [LokasiController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [LokasiController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [LokasiController::class, 'destroy'])->name('destroy');
    });

    Route::post('tambahpengelola', [AdminController::class, 'storePengelola'])->name('tambahpengelola');

    Route::prefix('member')->name('member.')->group(function () {
        Route::get('/', [MemberController::class, 'index'])->name('index');
        Route::get('create', [MemberController::class, 'create'])->name('create');
        Route::post('store', [MemberController::class, 'store'])->name('store');
        
    });

    Route::get('lapangan', [LapanganController::class, 'index'])->name('lapangan.index');

    Route::prefix('pengelola')->name('pengelola.')->group(function () {
        Route::get('/', [PengelolaController::class, 'index'])->name('index');
        Route::get('create', [PengelolaController::class, 'create'])->name('create');
        Route::post('store', [PengelolaController::class, 'store'])->name('store');
    });

    // Route for Rekapitulasi
    Route::get('rekapitulasi', [RekapitulasiController::class, 'index'])->name('rekapitulasi.index');
    Route::get('createpengelola', [AdminController::class, 'tambahPengelola'])->name('createpengelola');

});

// Routes for Pengelola
Route::prefix('pengelola')->name('pengelola.')->group(function () {
    Route::match(['post', 'get'], 'login', [PengelolaController::class, 'login'])->name('login');
    Route::get('index', [PengelolaController::class, 'index'])->name('index');
    Route::get('logout', [PengelolaController::class, 'logout'])->name('logout');
    Route::get('tambah', [PengelolaController::class, 'create'])->name('create');

    Route::post('tambahpengelola', [PengelolaController::class, 'storePengelola'])->name('tambahpengelola');

    Route::prefix('lokasi')->name('lokasi.')->group(function () {
        Route::get('tambah', [LokasiController::class, 'create'])->name('create');
        Route::get('/', [LokasiController::class, 'index'])->name('index');
        Route::post('store', [LokasiController::class, 'store'])->name('store');
        Route::get('edit/{id}', [LokasiController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [LokasiController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [LokasiController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('member')->name('member.')->group(function () {
        Route::get('/', [MemberController::class, 'index'])->name('index');
        Route::get('create', [MemberController::class, 'create'])->name('create');
        Route::post('store', [MemberController::class, 'store'])->name('store');
    });
});

// Routes for User
Route::prefix('user')->name('user.')->group(function () {
    Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('login', [UserController::class, 'login'])->name('login.submit');
    Route::get('register', [UserController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [UserController::class, 'register'])->name('register.submit');
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    
    Route::prefix('booking')->name('booking.')->group(function () {
        Route::get('user/userbooking', [UserBookingController::class, 'index'])->name('index');
        Route::post('tambahpengelola', [UserBookingController::class, 'storePengelola'])->name('tambahpengelola.index');

        Route::post('/save-order', 'OrderController@store'); 
    });
});
