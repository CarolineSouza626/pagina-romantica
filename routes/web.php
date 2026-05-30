<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoveMessageController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\SecretCardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SongController;
use App\Http\Controllers\Admin\TimelineEventController;
use App\Http\Controllers\Auth\AdminSessionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin/login', [AdminSessionController::class, 'create'])->name('admin.login');
Route::post('/admin/login', [AdminSessionController::class, 'store'])->name('admin.login.store');
Route::post('/admin/logout', [AdminSessionController::class, 'destroy'])->middleware('auth')->name('admin.logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('photos', PhotoController::class)->except(['show']);
    Route::resource('songs', SongController::class)->except(['show']);
    Route::resource('love-messages', LoveMessageController::class)->except(['show']);
    Route::resource('secret-cards', SecretCardController::class)->except(['show']);
    Route::resource('timeline-events', TimelineEventController::class)->except(['show']);
    Route::get('settings', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
});
