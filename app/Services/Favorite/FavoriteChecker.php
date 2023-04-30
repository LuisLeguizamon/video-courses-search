<?php

namespace App\Services\Favorite;

use App\Models\Favorite;

class FavoriteChecker
{
    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function isFavoriteVideo($videoId): bool
    {
        if (isset($this->user)) {
            $favoriteVideo = Favorite::where('video_id', $videoId)->where('user_id', $this->user->id)->exists();
        } else {
            $favoriteVideo = false;
        }

        return $favoriteVideo;
    }
}
