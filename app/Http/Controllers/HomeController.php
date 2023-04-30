<?php

namespace App\Http\Controllers;

use App\Helpers\AreasHelper;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function show()
    {
        return Inertia::render('Home', [
            'areas' => AreasHelper::getAreas(),
        ]);
    }
}
