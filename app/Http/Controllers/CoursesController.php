<?php

namespace App\Http\Controllers;

use App\Services\Favorite\FavoriteChecker;
use App\Services\Search\YouTubeVideoSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CoursesController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->category;
        $videos = app(YouTubeVideoSearch::class)->search($category);

        return Inertia::render('Courses/List', [
            'category' => $category,
            'videos' => $videos,
        ]);
    }

    public function show(Request $request)
    {
        $videoId = $request->videoId;
        $videoTitle = $request->title;

        $favoriteVideo = (new FavoriteChecker())->isFavoriteVideo($videoId, Auth::user());

        return Inertia::render('Courses/Show', [
            'videoId' => $videoId,
            'videoTitle' => $videoTitle,
            'favoriteVideo' => $favoriteVideo,
        ]);
    }
}
