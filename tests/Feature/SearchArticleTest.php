<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class SearchArticleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_search_articles()
    {
        $response = $this->get('/api/articles/search');

        $response
            ->assertJsonStructure([
                'data' => [
                    '*' => ['name', 'description', 'categories'],
                ]
            ])
            ->assertStatus(200);
    }
}
