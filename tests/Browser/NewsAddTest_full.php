<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddNewsTest extends DuskTestCase
{
 //   use RefreshDatabase;
    /**
     * A basic browser test example.
     *
     * @return void
     */

    public function newsTest()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/add')
                    ->type('title', 'title')
                    ->type('text', 'text text')
                    ->press('Опубликовать')
                    ->assertPathIs('/admin/add')

                    ->press('Перейти')
                    ->assertSee('title')
                    ->assertSee('text');
        });
    }
}
