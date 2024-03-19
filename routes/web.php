<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'getData'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/pre-test-2', [HomeController::class, 'preTestDua'])->middleware(['auth', 'verified'])->name('preTestDua');
Route::delete('/delete-data', [HomeController::class, 'destoy_data'])->middleware(['auth', 'verified'])->name('deleteData');
Route::get('/create-data', [HomeController::class, 'create'])->middleware(['auth', 'verified'])->name('add-data');
Route::post('/store-data', [HomeController::class, 'store'])->middleware(['auth', 'verified'])->name('store-data');
Route::get('/edit-data/{id}', [HomeController::class, 'edit'])->middleware(['auth', 'verified'])->name('edit');
Route::put('/update-data/{id}', [HomeController::class, 'update'])->middleware(['auth', 'verified'])->name('update-data');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
