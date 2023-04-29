<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
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

        return Inertia::render('Search/Results', [
            'category' => $category,
            'videos' => $videos,
        ]);
    }

    public function show(Request $request)
    {
        $videoId = $request->videoId;
        $videoTitle = $request->title;

        $user = Auth::user();
        $favoriteVideo = false;

        if (isset($user)) {
            $userId = Auth::user()->id;
            $favoriteVideo = Favorite::where('video_id', $request->videoId)->where('user_id', $userId)->exists();
        }

        return Inertia::render('Search/ShowVideo', [
            'videoId' => $videoId,
            'videoTitle' => $videoTitle,
            'favoriteVideo' => $favoriteVideo,
        ]);
    }
}
