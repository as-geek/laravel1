<?php

namespace Tests\Feature;

use App\Http\Controllers\NewsController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testGetNews()
    {
        $news = (new NewsController())->getNews();
        $this->assertIsArray($news);

        foreach ($news as $key => $value) {
            $this->assertIsString($key);
            $this->assertIsArray($value);
            $this->assertNotEmpty($value);
            foreach ($value as $title => $text) {
                $this->assertIsString($title);
                $this->assertIsString($text);
                $this->assertNotEmpty($text);
            }
        }
    }
}
