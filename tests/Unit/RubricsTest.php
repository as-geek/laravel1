<?php

namespace Tests\Feature;

use App\Http\Controllers\NewsController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RubricsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetRubrics()
    {
        $rubrics = (new NewsController())->getRubrics();
        $this->assertIsArray($rubrics);

        foreach ($rubrics as $key => $value) {
            $this->assertIsString($key);
            $this->assertIsString($value);
            $this->assertNotEmpty($value);
        }
    }
}
