<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BeerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $baseBeers = collect(json_decode(\File::get(storage_path('app/beers.json')), true));
        $beers = $baseBeers->map(function($beerData){
            return [
                'name' => $beerData['name'],
                'description' => $beerData['description'],
                'tagline' => $beerData['tagline'],
                'first_brewed' => $beerData['first_brewed'],
                'brewery_location' => fake()->address(),
                'brewers_tips' => $beerData['brewers_tips'],
                'image_url' => $beerData['image_url'],
                'abv' => $beerData['abv'],
                'ingredients' => json_encode($beerData['ingredients']),
                'food_pairing' => json_encode($beerData['food_pairing']),
            ];
        })->toArray();
        \DB::table('beers')->insert($beers);
    }
}
