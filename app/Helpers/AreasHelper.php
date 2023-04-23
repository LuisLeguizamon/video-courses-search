<?php

namespace App\Helpers;

class AreasHelper
{
    public static function getAreas() : array
    {
        $areas = [];
        array_push($areas, ['area' => 'sports', 'background' => 'bg-gradient-to-r from-cyan-500 to-blue-500']);
        array_push($areas, ['area' => 'finance', 'background' => 'bg-gradient-to-r from-cyan-500 to-emerald-500']);
        array_push($areas, ['area' => 'leadership', 'background' => 'bg-gradient-to-r from-sky-500 to-blue-800']);
        array_push($areas, ['area' => 'coding', 'background' => 'bg-gradient-to-r from-blue-500 to-purple-500']);

        return $areas;
    }
}