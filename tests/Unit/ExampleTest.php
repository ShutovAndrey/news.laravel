<?php

namespace Tests\Unit;

use App\News;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertIsArray(News::getNews());
        $this->assertIsArray(News::getNewsByCategoryName('sport'));
    }

    public function testBasicTest1()
    {
        $response = $this->get('/admin/add');

        $response->assertSeeText('Текст новости');
    }

    public function testBasicTest2()
    {
        $response = $this->get('/about');

        $response->assertDontSeeText('ничего плохого');
    }

    public function testBasicTest3()
    {
        $response = $this->get('/news');

        $response->assertViewIs('news.all');
    }

    public function testBasicTest4()
    {
        $response = $this->get('/news/category/politics');

        $response->assertViewHas('name', $value = 'Политика'); //ругается почему то на этот тест
    }

    public function testBasicTest5()
    {
        $response = $this->get('/admin');

        $response->assertSuccessful();
    }
}
