<?php
use Illuminate\Support\Facades\Route;

/* ============ PUBLIC — frontend site ============ */
Route::view('/', 'public.pages.home')->name('site.home');
Route::view('/home', 'public.pages.home')->name('home');

Route::view('/about', 'public.pages.about')->name('site.about');
Route::view('/project', 'public.pages.project')->name('site.project');
Route::view('/investment', 'public.pages.investment')->name('site.investment');
Route::view('/gallery', 'public.pages.gallery')->name('site.gallery');
Route::view('/contact', 'public.pages.contact')->name('site.contact');

/* ============ PUBLIC — auth (design-only, no backend yet) ============ */
Route::view('/login', 'public.auth.login')->name('login');

/* ============ PROTECTED — backend dashboard (design-only, no auth middleware yet) ============ */
Route::view('/dashboard', 'protected.dashboard.index')->name('dashboard.index');

Route::view('/dashboard/about', 'protected.dashboard.about')->name('dashboard.about');
Route::view('/dashboard/project', 'protected.dashboard.project')->name('dashboard.project');
Route::view('/dashboard/investment', 'protected.dashboard.investment')->name('dashboard.investment');
Route::view('/dashboard/gallery', 'protected.dashboard.gallery')->name('dashboard.gallery');
Route::view('/dashboard/contact', 'protected.dashboard.contact')->name('dashboard.contact');

/* ============ PROTECTED — auth actions (design-only) ============ */
Route::post('/logout', \App\Livewire\Actions\Logout::class)->name('logout');

