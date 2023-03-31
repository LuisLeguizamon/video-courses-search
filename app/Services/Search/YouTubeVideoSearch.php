<?php

namespace App\Services\Search;

use App\Contracts\VideoSearchContract;

class YouTubeVideoSearch implements VideoSearchContract
{
    public function search(string $category): array
    {
        $api = new YouTubeAPI();

        $videos = $api->getVideos($category);

        return $this->processResponse($videos);
    }

    private function processResponse($response): array
    {
        $videos = array();

        foreach ($response->items as $item) {
            $video = [
                'videoId' => $item->id->videoId,
                'videoTitle' => $item->snippet->title
            ];

            array_push($videos, $video);
        }

        return $videos;
    }
}
