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