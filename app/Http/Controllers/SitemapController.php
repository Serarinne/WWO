<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Character;
use App\Models\Wallpaper;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SitemapController extends Controller
{
  	protected $limit = 10000;
  	
    public function index()
    {
        return response()->view('sitemap.index')->header('Content-Type', 'text/xml');
    }

    public function wallpaperIndex()
    {
        // Tambahkan filter whereNotNull untuk SEO dan slug
        $query = Wallpaper::published();

        $totalWallpapers = $query->count();
        $totalPages = max(1, ceil($totalWallpapers / $this->limit));
        
        $latest = (clone $query)->latest('updated_at')->first();

        return response()->view('sitemap.wallpaper_index', [
            'totalPages' => $totalPages,
            'latest' => $latest
        ])->header('Content-Type', 'text/xml');
    }

    public function wallpapers($page)
    {
        $offset = ($page - 1) * $this->limit;

        // Terapkan filter yang sama saat memuat data URL
        $wallpapers = Wallpaper::published()
            ->select('slug', 'updated_at')
            ->offset($offset)
            ->limit($this->limit)
            ->get();

        if ($wallpapers->isEmpty()) {
            abort(404);
        }

        return response()->view('sitemap.wallpapers', compact('wallpapers'))
            ->header('Content-Type', 'text/xml');
    }

    public function characterIndex()
    {
        $query = Character::published()->has('wallpapers');

        $totalCharacters = $query->count();
        $totalPages = max(1, ceil($totalCharacters / $this->limit));
        $latest = (clone $query)->latest('updated_at')->first();

        return response()->view('sitemap.character_index', [
            'totalPages' => $totalPages,
            'latest' => $latest
        ])->header('Content-Type', 'text/xml');
    }

    public function characters($page)
    {
        $offset = ($page - 1) * $this->limit;
        
        $characters = Character::with('series')
            ->select([
                'characters.id',
                'characters.slug',
                'characters.name',
                'characters.image',
            ])
            ->has('wallpapers')
            ->published()
            ->offset($offset)
            ->limit($this->limit)
            ->get();

        if ($characters->isEmpty()) {
            abort(404);
        }

        return response()->view('sitemap.characters', compact('characters'))
            ->header('Content-Type', 'text/xml');
    }

    public function tagIndex()
    {
        $query = Tag::published()->has('wallpapers');

        $totalTags = $query->count();
        $totalPages = max(1, ceil($totalTags / $this->limit));
        $latest = (clone $query)->latest('updated_at')->first();

        return response()->view('sitemap.tag_index', [
            'totalPages' => $totalPages,
            'latest' => $latest
        ])->header('Content-Type', 'text/xml');
    }

    public function tags($page)
    {
        $offset = ($page - 1) * $this->limit;
        
        $tags = Tag::published()
            ->has('wallpapers')
            ->select('slug', 'updated_at')
            ->offset($offset)
            ->limit($this->limit)
            ->get();

        if ($tags->isEmpty()) {
            abort(404);
        }

        return response()->view('sitemap.tags', compact('tags'))
            ->header('Content-Type', 'text/xml');
    }

    public function seriesIndex()
    {
        $query = Series::published();

        $totalSeries = $query->count();
        $totalPages = max(1, ceil($totalSeries / $this->limit));
        $latest = (clone $query)->latest('updated_at')->first();

        return response()->view('sitemap.series_index', [
            'totalPages' => $totalPages,
            'latest' => $latest
        ])->header('Content-Type', 'text/xml');
    }

    public function series($page)
    {
        $offset = ($page - 1) * $this->limit;
        
        $series = Series::published()
            ->select('slug', 'updated_at')
            ->offset($offset)
            ->limit($this->limit)
            ->get();

        if ($series->isEmpty()) {
            abort(404);
        }

        return response()->view('sitemap.series', compact('series'))
            ->header('Content-Type', 'text/xml');
    }
}