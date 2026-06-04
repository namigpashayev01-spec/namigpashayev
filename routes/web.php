<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Marşrutları (Server-side render olunan səhifələr)
|--------------------------------------------------------------------------
| Hər səhifə Laravel tərəfindən serverdə hazırlanıb istifadəçiyə HTML kimi
| göndərilir (SSR). Adlandırılmış route-lar SEO və daxili keçidlər üçün
| istifadə olunur.
*/

Route::get('/',          [PageController::class, 'home'])->name('home');
Route::get('/haqqimda',  [PageController::class, 'about'])->name('about');
Route::get('/xidmetler', [PageController::class, 'services'])->name('services');
Route::get('/elaqe',     [PageController::class, 'contact'])->name('contact');
Route::post('/elaqe',    [PageController::class, 'sendContact'])->name('contact.send');

// SEO faylları
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
