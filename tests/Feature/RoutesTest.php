<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoutesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetRoutes()
    {
        $this->get('/')->assertStatus(200);
        $this->get('/news/rubrics')->assertStatus(200);
        $this->get('/auth')->assertStatus(200);
        $this->get('/addComments')->assertStatus(200);
    }
}
