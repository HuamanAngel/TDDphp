<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */   
    public function testBasicTest()
    {
        // $this->json('GET','api/tag');

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
