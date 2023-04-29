<?php

namespace App\Services\Favorite;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteChecker
{
    private $user;

    public function __construct()
    {
        $this->user = Auth::user();
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
