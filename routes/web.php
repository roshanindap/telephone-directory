<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\HomeController;

// Authentication Routes
Auth::routes();


Route::get('/', function () {
    return auth()->check() ? redirect()->route('home') : redirect()->route('login');
});

// Contact Search Route
Route::get('contacts/search', [ContactController::class, 'search'])->name('contacts.search');

// Protected Routes 
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home'); 
    Route::resource('contacts', ContactController::class);
    Route::get('analytics', [ContactController::class, 'showContactAnalytics'])->name('analytics.analytics');
    
});

