<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Services\Search\YouTubeVideoSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function markVideoAsFavorite(Request $request)
    {
        $videoID = $request->video_id;
        $userId = Auth::user()->id;
        $favoriteVideo = Favorite::where('video_id', $videoID)->where('user_id', $userId)->first();

        if (! isset($favoriteVideo)) {
            $favorite = new Favorite();
            $favorite->video_id = $request->video_id;
            $favorite->user_id = $userId;
            $favorite->save();
        } else {
            // TODO: message that video already been marked as favorite
        }
    }
}
