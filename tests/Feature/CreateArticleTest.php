<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateArticleTest extends TestCase
{
    /**
     * Store Article Test.
     *
     * @return void
     */
    public function test_create_article(): void
    {
        $response = $this->post('/api/articles', [
            'name' => "Laptop 14' inches Lenovo",
            'description' => "Lenovo ThinkPad is a Windows 10 laptop with a 14.00-inch display.",
            'status' => false
        ]);

        $response
            ->assertJson([
                'name' => "Laptop 14' inches Lenovo",
                'description' => "Lenovo ThinkPad is a Windows 10 laptop with a 14.00-inch display.",
                'status' => true
            ])
            ->assertStatus(201);
    }
}
