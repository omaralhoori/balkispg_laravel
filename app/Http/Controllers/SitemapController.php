<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $locales = config('app.supported_locales', ['ar', 'en', 'tr', 'fr']);
        
        $urls = [];

        foreach ($locales as $locale) {
            // Static pages
            $urls[] = [
                'loc' => url('/' . $locale),
                'lastmod' => now()->startOfDay()->toAtomString(),
                'changefreq' => 'daily',
                'priority' => '1.0',
            ];

            $urls[] = [
                'loc' => url('/' . $locale . '/programs'),
                'lastmod' => now()->startOfDay()->toAtomString(),
                'changefreq' => 'daily',
                'priority' => '0.8',
            ];

            $urls[] = [
                'loc' => url('/' . $locale . '/blog'),
                'lastmod' => now()->startOfDay()->toAtomString(),
                'changefreq' => 'daily',
                'priority' => '0.8',
            ];

            $urls[] = [
                'loc' => url('/' . $locale . '/about'),
                'lastmod' => now()->startOfDay()->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ];

            // Dynamic Blog Posts
            $posts = BlogPost::where('is_active', true)
                ->where('published_at', '<=', now())
                ->get();

            foreach ($posts as $post) {
                // If the model has an updated_at, use it. Otherwise, use published_at.
                $lastmod = $post->updated_at ? $post->updated_at->toAtomString() : ($post->published_at ? $post->published_at->toAtomString() : now()->toAtomString());
                
                $urls[] = [
                    'loc' => url('/' . $locale . '/blog/' . $post->slug),
                    'lastmod' => $lastmod,
                    'changefreq' => 'weekly',
                    'priority' => '0.9',
                ];
            }
        }

        return Response::view('sitemap', [
            'urls' => $urls
        ])->header('Content-Type', 'text/xml');
    }
}
