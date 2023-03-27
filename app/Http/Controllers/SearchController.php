<?php

namespace App\Http\Controllers;

use App\Services\Search\GetVideosFromYoutube;
use Illuminate\Http\Request;
use Inertia\Inertia;


class SearchController extends Controller
{
    public function search()
    {
        $areas = ['sports', 'finance', 'leadership', 'coding'];

        return Inertia::render('Search/Search', [
            'areas' => $areas,
        ]);
    }

    public function searchByCategory(Request $request)
    {
        $category = $request->category;
        $videos = app(GetVideosFromYoutube::class)->execute($category);

        return Inertia::render('Search/Results', [
            'category' => $category,
            'videos' => $videos,
        ]);
    }

    public function showVideo(Request $request)
    {
        $videoId = $request['videoId'];

        return Inertia::render('Search/ShowVideo', [
            'videoId' => $videoId,
        ]);
    }
}
