<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNewsList()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
        $response->assertSeeText('Список новостей');
        $response->assertSeeText('news 4');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNewsCard()
    {
        $response = $this->get('/news/1');

        $response->assertStatus(200);
        $response->assertSeeText('news 1');
        $response->assertSeeText('News content');
    }
}
