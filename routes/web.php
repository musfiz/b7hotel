<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'site.home')->name('site.home');
Route::view('/home', 'site.home')->name('home');

Route::view('/about', 'site.about')->name('site.about');
Route::view('/project', 'site.project')->name('site.project');
Route::view('/investment', 'site.investment')->name('site.investment');
Route::view('/shareholders', 'site.shareholders')->name('site.shareholders');
Route::view('/gallery', 'site.gallery')->name('site.gallery');
Route::view('/contact', 'site.contact')->name('site.contact');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
