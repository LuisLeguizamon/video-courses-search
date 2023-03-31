<?php

namespace App\Services\Search;

use App\Contracts\VideoSearch;

class YouTubeVideoSearch implements VideoSearch
{
    public function search(string $category): array
    {
        $api = new YouTubeAPI();

        $videos = $api->getVideos($category);

        return $this->processResponse($videos);
    }

    private function processResponse($response): array
    {
        $responsePhpObject = json_decode($response);

        $videos = array();

        foreach ($responsePhpObject->items as $item) {
            $video = [
                'videoId' => $item->id->videoId,
                'videoTitle' => $item->snippet->title
            ];

            array_push($videos, $video);
        }

        return $videos;
    }
}
