<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\Wallpaper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('q'));

        $series = Series::query()
            ->select([
                'series.id',
                'series.slug',
                'series.name',
                'series.image',
            ])
            ->published()
            ->allowedRating()
            ->when($search !== '', fn ($q) => $q->search($search))
            ->paginate(30)
            ->onEachSide(1)
            ->appends([
                'q' => $search !== '' ? $search : null,
            ]);

        return view('series.index', compact('series', 'search'));
    }

    public function show(Request $request, Series $series)
    {
        // 1. Ambil data spesifik dari Series sesuai dengan route parameter
        $series = Series::query()
            ->select([
                'series.id',
                'series.slug',
                'series.name',
                'series.image',
                'series.seo_title',
                'series.seo_description',
                'series.seo_keywords',
                'series.description',
            ])
            ->published()
            ->allowedRating()
            ->where('series.slug', $series->slug)
            ->firstOrFail();

        // 2. Dapatkan array ID karakter dari series tersebut
        // Menggunakan pluck hanya memuat array integer (sangat ringan di RAM)
        $characterIds = $series->characters()->pluck('characters.id');

        // 3. Ambil wallpaper terkait tanpa join manual
        $wallpapers = Wallpaper::query()
            ->select([
                'wallpapers.id',
                'wallpapers.slug',
                'wallpapers.rating',
                'wallpapers.thumbnail',
                'wallpapers.preview',
                'wallpapers.width',
                'wallpapers.height',
                'wallpapers.favorites_count',
                'wallpapers.views_count',
                'wallpapers.created_at',
            ])
            ->whereHas('characters', function ($query) use ($characterIds) {
                // Memfilter wallpaper yang memiliki relasi ke karakter-karakter di atas
                $query->whereIn('characters.id', $characterIds);
            })
            ->published()
            ->allowedRating()
            ->latest('wallpapers.id')
            ->paginate(30)
            ->onEachSide(1)
            ->withQueryString();

        return view('series.view', compact('series', 'wallpapers'));
    }

    public function characters(Series $series)
    {
        // 1. Ambil detail series (opsional: jika Anda butuh detail metadata series di view)
        // Jika tidak butuh karena $series dari route model binding sudah cukup, 
        // blok query ini bisa dilewati. Namun untuk performa dan keamanan select column:
        $series = Series::query()
            ->select([
                'series.id',
                'series.slug',
                'series.name',
                'series.image',
                'series.seo_title',
                'series.seo_description',
                'series.seo_keywords',
                'series.description',
            ])
            ->published()
            ->allowedRating()
            ->where('series.slug', $series->slug)
            ->firstOrFail();

        // 2. Ambil daftar karakter yang terhubung dengan series ini
        $characters = $series->characters()
            ->with('series')
            ->select([
                'characters.id',
                'characters.slug',
                'characters.name',
                'characters.image',
            ])
            ->has('wallpapers')
            ->published()
            ->allowedRating()
            ->internalPopular()
            ->paginate(30)
            ->onEachSide(1);

        return view('series.characters', compact('series', 'characters'));
    }
}