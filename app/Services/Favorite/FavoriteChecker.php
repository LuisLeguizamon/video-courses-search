<?php

namespace App\Services\Favorite;

use App\Contracts\FavoriteCheckerContract;
use App\Models\Favorite;

class FavoriteChecker implements FavoriteCheckerContract
{
    public function isFavoriteVideo($videoId, $user): bool
    {
        if (isset($user)) {
            $favoriteVideo = Favorite::where('video_id', $videoId)->where('user_id', $user->id)->exists();
        } else {
            $favoriteVideo = false;
        }

        return $favoriteVideo;
    }
}
