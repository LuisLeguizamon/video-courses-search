<?php

namespace App\Contracts;

interface FavoriteCheckerContract
{
    public function isFavoriteVideo($videoId, $user): bool;
}
