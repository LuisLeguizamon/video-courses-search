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
}
