<?php

namespace App\Http\Controllers;

use App\Helpers\AreasHelper;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function show()
    {
        return Inertia::render('Search/Home', [
            'areas' => AreasHelper::getAreas(),
        ]);
    }
}
