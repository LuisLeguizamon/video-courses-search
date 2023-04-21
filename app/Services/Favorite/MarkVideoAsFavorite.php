<?php

namespace App\Services\Favorite;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class MarkVideoAsFavorite
{
    public function execute(string $videoId): void
    {
        $userId = Auth::user()->id;
        $favoriteVideo = Favorite::where('video_id', $videoId)->where('user_id', $userId)->first();

        if (!isset($favoriteVideo)) {
            $this->createFavorite($userId, $videoId);
        } else {
            // TODO: message that video already been marked as favorite
        }
    }

    public function createFavorite($userId, $videoId): void
    {
        $favorite = new Favorite();
        $favorite->video_id = $videoId;
        $favorite->user_id = $userId;
        $favorite->save();
    }
}
