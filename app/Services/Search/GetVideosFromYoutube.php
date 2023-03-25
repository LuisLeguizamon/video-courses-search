<?php

namespace App\Services\Search;

class GetVideosFromYoutube
{
    public function execute(string $category) : array
    {
        $url = 'https://www.googleapis.com/youtube/v3/search';
        $params = [
            'key' => env('YOUTUBE_API_KEY'),
            'maxResults' => 5,
            'part' => 'id,snippet',
            'q' => $category,
            'type' => 'video',
            'videoCategoryId' => 27,
            /* videoCategoryId = 27 for Education.
            This data have been retrieve from 
            the "list category" method in the API
            https://youtube.googleapis.com/youtube/v3/videoCategories?part=id&part=snippet&regionCode=PY&key=[YOUR_API_KEY]*/
        ];
        $url .= '?' . http_build_query($params);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        curl_close($curl);

        return $this->processResponse($response);
    }

    private function processResponse($response) : array
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