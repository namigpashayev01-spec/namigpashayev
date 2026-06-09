<?php

namespace App\Http\Controllers;

use App\Support\Blog;

class SitemapController extends Controller
{
    /**
     * Dinamik sitemap.xml — axtarış sistemləri (Google və s.) üçün.
     */
    public function index()
    {
        $urls = [
            ['loc' => route('home'),      'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => route('services'),  'priority' => '0.9', 'changefreq' => 'monthly'],
            ['loc' => route('course'),    'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => route('about'),     'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => route('blog'),      'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => route('contact'),   'priority' => '0.6', 'changefreq' => 'yearly'],
        ];

        // Bloq məqalələrini də sitemap-a əlavə edirik
        foreach (Blog::all() as $post) {
            $urls[] = [
                'loc'        => route('blog.show', $post['slug']),
                'priority'   => '0.7',
                'changefreq' => 'monthly',
                'lastmod'    => $post['date'],
            ];
        }

        return response()
            ->view('sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml');
    }
}
