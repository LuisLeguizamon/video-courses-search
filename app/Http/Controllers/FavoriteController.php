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
        $userId = Auth::user()->id;
        $favoriteVideos = Favorite::where('user_id', $userId)->get();

        return Inertia::render('Favorites', [
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

        return redirect()->route('courses.show', ['videoId' => $videoId, 'title' => $videoTitle ]);
    }
}
