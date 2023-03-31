<?php

namespace App\Contracts;

interface YouTubeAPIContract
{
    public function getVideos(string $category);
}