<?php

namespace App\Services\Search;

class GetVideosFromYoutube
{
    public function execute(string $category) : array
    {
        $url = $this->getUrl($category);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        curl_close($curl);

        return $this->processResponse($response);
    }

    private function getUrl(string $category)
    {
        $url = 'https://www.googleapis.com/youtube/v3/search';

        $params = $this->getParams($category);

        $url .= '?' . http_build_query($params);

        return $url;
    }

    private function getParams(string $category) : array
    {
        return [
            'key' => env('YOUTUBE_API_KEY'),
            'maxResults' => 10,
            'part' => 'id,snippet',
            'q' => $category.' course',
            'type' => 'video',
            'videoCategoryId' => 27,
            /* videoCategoryId = 27 for Education.
             This data have been retrieve from the "list category" method in the API
             https://youtube.googleapis.com/youtube/v3/videoCategories?part=id&part=snippet&regionCode=PY&key=[YOUR_API_KEY]
            */
        ];
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