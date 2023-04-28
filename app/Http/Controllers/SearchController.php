<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Services\Search\YouTubeVideoSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


class SearchController extends Controller
{
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
        $videoTitle = $request['title'];

        $user = Auth::user();

        $favoriteVideo = false;

        if (isset($user)) {
            $userId = Auth::user()->id;
            $favoriteVideo = Favorite::where('video_id', $videoId)->where('user_id', $userId)->first() ? true : false;
        }

        return Inertia::render('Search/ShowVideo', [
            'videoId' => $videoId,
            'videoTitle' => $videoTitle,
            'favoriteVideo' => $favoriteVideo,
        ]);
    }
}
