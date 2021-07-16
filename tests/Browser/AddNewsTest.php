<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddNewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                    ->assertSee('Заголовок')
            ->type('news[title]', '')
            ->press('Сохранить')
            ->assertSee('Поле Заголовок обязательно для заполнения.');
        });
    }
}
