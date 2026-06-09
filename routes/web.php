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
| istifadə olunur. URL-lər SEO-ya uyğun, oxunaqlı və açar söz əsaslıdır.
*/

Route::get('/',          [PageController::class, 'home'])->name('home');
Route::get('/xidmetler', [PageController::class, 'services'])->name('services');
Route::get('/haqqimda',  [PageController::class, 'about'])->name('about');
Route::get('/kurs',      [PageController::class, 'course'])->name('course');
Route::post('/kurs',     [PageController::class, 'registerCourse'])->name('course.register');

// Bloq: siyahı + tək məqalə (SEO üçün ayrıca məqalə URL-i)
Route::get('/bloq',           [PageController::class, 'blog'])->name('blog');
Route::get('/bloq/{slug}',    [PageController::class, 'blogShow'])->name('blog.show');

// Əlaqə
Route::get('/elaqe',  [PageController::class, 'contact'])->name('contact');
Route::post('/elaqe', [PageController::class, 'sendContact'])->name('contact.send');

// Qiymət təklifi (header-dəki modal forma — bütün səhifələrdən işləyir)
Route::post('/qiymet-teklifi', [PageController::class, 'sendQuote'])->name('quote.send');

// Lead magnet (pulsuz material — e-poçt toplama)
Route::post('/pulsuz-material', [PageController::class, 'subscribeLead'])->name('lead.subscribe');

// SEO faylları
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
