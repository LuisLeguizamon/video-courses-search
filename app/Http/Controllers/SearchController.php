<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;


class SearchController extends Controller
{
    public function search()
    {
        return Inertia::render('Search/Search', []);
    }
}
