<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\DetteController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashbord',[DashboardContoller::class,'index'])->name('dashboard.index');
    Route::post('/dashboard',[ColocationController::class,'store'])->name('colocation.store');
    Route::get('/colocation',[ColocationController::class,'index'])->name('colocation.index');
    Route::get('/join',[ColocationController::class,'join'])->name('colocation.join.show')->middleware('can:create-join-colocation');
    Route::post('/join',[ColocationController::class,'joinColocation'])->name('colocation.join');
    Route::get('/expense',[ExpenseController::class,'index'])->name('expense.index')->middleware('can:add-expense');
    Route::post('/expense',[ExpenseController::class,'store'])->name('expense.store');
    Route::get('/dette',[DetteController::class,'index'])->name('dette.index')->middleware('can:add-expense');
    Route::get('/markaspayed/{id}',[DetteController::class,'markaspayed'])->name('dette.markaspayed');
    Route::get('quit',[ColocationController::class,'quitColocation'])->name('colocation.quit');
    Route::get('/admin',[AdminDashboardController::class,'index'])->name('admin.dashboard')->middleware('can:show-administration');
    Route::get('/ban/{user_id}',[RegisteredUserController::class,'ban'])->name('user.ban')->middleware('can:show-administration');
    Route::get('members',[RegisteredUserController::class,'showmembers'])->name('show.members')->middleware('can:create-join-colocation');
});

require __DIR__.'/auth.php';
