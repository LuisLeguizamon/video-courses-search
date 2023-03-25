<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;


class SearchController extends Controller
{
    public function search()
    {
        $areas = ['deportes', 'finanzas', 'liderazgo', 'programación'];

        return Inertia::render('Search/Search', [
            'areas' => $areas,
        ]);
    }

    public function searchByCategory(Request $request)
    {
        $category = $request->category;

        $url = 'https://www.googleapis.com/youtube/v3/search';
        $params = [
            'key' => '',
            'maxResults' => 5,
            'part' => 'id,snippet',
            'q' => $category,
            'type' => 'video',
        ];
        $url .= '?' . http_build_query($params);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        curl_close($curl);

        dd($response);
    }
}
