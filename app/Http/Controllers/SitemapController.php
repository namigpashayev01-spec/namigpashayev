<?php

namespace App\Http\Controllers;

class SitemapController extends Controller
{
    /**
     * Dinamik sitemap.xml — axtarış sistemləri (Google və s.) üçün.
     */
    public function index()
    {
        $urls = [
            ['loc' => route('home'),     'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => route('about'),    'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => route('services'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => route('contact'),  'priority' => '0.6', 'changefreq' => 'yearly'],
        ];

        return response()
            ->view('sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml');
    }
}
