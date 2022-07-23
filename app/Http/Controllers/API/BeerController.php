<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\Beer;

class BeerController extends Controller
{
    public function random()
    {
        $randomBeer = Beer::inRandomOrder()->limit(1)->first();
        return response()->json($randomBeer);
    }
}
