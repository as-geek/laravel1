<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateNewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreateNewsFails()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                    ->assertSee('Создать новость')
                    ->type('title', 'АА')
                    ->type('content', '')
                    ->press('Создать')
                    ->assertSee('Количество символов в поле Заголовок должно быть не менее 3.')
                    ->assertSee('Поле Контент обязательно для заполнения.');
        });
    }

    public function testCreateNewsOk()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->assertSee('Создать новость')
                ->type('title', 'AAA')
                ->type('content', 'AAA')
                ->press('Создать')
                ->assertPathIs('/admin/news/create');
        });
    }
}
