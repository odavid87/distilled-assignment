<?php

namespace Tests\Feature;

use Database\Seeders\BeerSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class BeerAPITest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed(BeerSeeder::class);
    }

    /**
     * @test
     * @dataProvider beerListProvider
     *
     */
    public function apiBeerListEndpoint_providedPage_returnedJsonContainsPaginationDataAndBeersOfRequestedPage($path, $page)
    {
        $response = $this->getJson($path);

        $response
            ->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) =>$this->assertBeerApiPageHasPagerDataAndFiveBeers($json, $page));
    }

    public function beerListProvider()
    {
        return [
            ['path' => '/api/beer', 'page' => 1],
            ['path' => '/api/beer?page=2', 'page' => 2],
            ['path' => '/api/beer?page=3', 'page' => 3],
            ['path' => '/api/beer?page=4', 'page' => 4],
            ['path' => '/api/beer?page=5', 'page' => 5],
        ];
    }


    private function assertBeerApiPageHasPagerDataAndFiveBeers($json, $page)
    {
        $json->where('current_page', $page)
            ->where('first_page_url', 'http://localhost/api/beer?page=1')
            ->where('next_page_url', $page == 5 ? null : 'http://localhost/api/beer?page=' . $page + 1)
            ->where('prev_page_url', $page == 1 ? null : 'http://localhost/api/beer?page=' . $page - 1)
            ->where('last_page_url', 'http://localhost/api/beer?page=5')
            ->where('per_page', 5)
            ->where('last_page', 5)
            ->where('total', 25)
            ->where('from', 1 + (($page - 1) * 5))
            ->where('to', $page * 5)
            ->where('path', 'http://localhost/api/beer')
            ->has('links')
            ->has('data', 5)
            ->has('data.0', fn($json) => $this->assertJsonContainsAllBeerFields($json))
            ->has('data.1', fn($json) => $this->assertJsonContainsAllBeerFields($json))
            ->has('data.2', fn($json) => $this->assertJsonContainsAllBeerFields($json))
            ->has('data.3', fn($json) => $this->assertJsonContainsAllBeerFields($json))
            ->has('data.4', fn($json) => $this->assertJsonContainsAllBeerFields($json));
    }

    /**
     * @test
     */
    public function apiBeerRandomEndpoint_returnedJsonContainsAllBeerFields()
    {
        $response = $this->getJson('/api/beer/random');

        $response
            ->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) =>
                $this->assertJsonContainsAllBeerFields($json)
            );
    }

    private function assertJsonContainsAllBeerFields($json)
    {
        return $json->hasAll([
            'id',
            'name',
            'description',
            'tagline',
            'first_brewed',
            'brewery_location',
            'brewers_tips',
            'image_url',
            'abv',
            'ingredients',
            'food_pairing',
        ]);
    }

}
