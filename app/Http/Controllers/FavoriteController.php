<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Services\Favorite\MarkVideoAsFavorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class FavoriteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $favoriteVideos = null;

        if (isset($user)) {
            $userId = Auth::user()->id;
            $favoriteVideos = Favorite::where('user_id', $userId)->get();
        } else {
            return redirect()->route('login');
        }

        return Inertia::render('Search/Favorites', [
            'videos' => $favoriteVideos,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'video_id' => 'required',
            'video_title' => 'required',
        ]);

        $videoId = $validated['video_id'];
        $videoTitle = $validated['video_title'];

        DB::transaction(function () use ($videoId, $videoTitle) {
            app(MarkVideoAsFavorite::class)->execute($videoId, $videoTitle);
        });

        return redirect()->route('search.show_video', ['videoId' => $videoId, 'title' => $videoTitle ]);
    }
}
