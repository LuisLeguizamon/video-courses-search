<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Services\Favorite\MarkVideoAsFavorite;
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

        $user = Auth::user();

        $favoriteVideo = false;

        if (isset($user)) {
            $userId = Auth::user()->id;
            $favoriteVideo = Favorite::where('video_id', $videoId)->where('user_id', $userId)->first() ? true : false;
        }

        return Inertia::render('Search/ShowVideo', [
            'videoId' => $videoId,
            'favoriteVideo' => $favoriteVideo,
        ]);
    }

    public function markVideoAsFavorite(Request $request)
    {
        $validated = $request->validate([
            'video_id' => 'required'
        ]);

        $videoId = $validated['video_id'];

        DB::transaction(function () use ($videoId) {
            app(markVideoAsFavorite::class)->execute($videoId);
        });

        return redirect()->route('search.show_video', ['videoId' => $videoId]);
    }
}
