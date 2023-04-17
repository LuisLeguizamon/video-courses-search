<?php

namespace App\Http\Controllers;

use App\Services\Search\YouTubeVideoSearch;
use Illuminate\Http\Request;
use Inertia\Inertia;


class SearchController extends Controller
{
    public function home()
    {
        $areas = ['sports', 'finance', 'leadership', 'coding'];

        return Inertia::render('Search/Home', [
            'areas' => $areas,
        ]);
    }

    public function searchByCategory(Request $request)
    {
        $category = $request->category;
        $videos = app(YouTubeVideoSearch::class)->search($category);

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
