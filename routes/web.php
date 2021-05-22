<?php

use App\Http\Controllers\ManageController;
use App\Http\Controllers\PhotoController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');

    Route::get('/manage', [ManageController::class, 'index'])->name('manage');
    Route::delete('/manage/{id}', [ManageController::class, 'destroy'])->name('delete');
    Route::get('/manage/update/{id}', [ManageController::class, 'show'])->name('show');
    Route::put('/manage/update/{id}', [ManageController::class, 'update'])->name('update');
    Route::put('/manage/update-status/{id}', [ManageController::class, 'updateStatus'])->name('updateStatus');
    
    Route::get('/dashboard', [PhotoController::class, 'index'])->name('dashboard');
    Route::get('/add-more', [PhotoController::class, 'create'])->name('create');
    Route::post('/add-more', [PhotoController::class, 'store'])->name('add');
});

require __DIR__.'/auth.php';