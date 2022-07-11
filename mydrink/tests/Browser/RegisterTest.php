<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group register
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertPathIs('/')
                    ->clickLink('Register')
                    ->assertPathIs('/register')
                    ->type('name', 'Ilham Maulana')
                    ->type('email', 'customer33@gmail.com') //email harus selalu diganti
                    ->radio('role', 'customer')
                    ->assertRadioSelected('role', 'customer')
                    ->type('password', 'cobacoba123')
                    ->type('password_confirmation', 'cobacoba123')
                    ->press('Register')
                    ->pause(2000)
                    ->assertPathIs('/beranda');
        });
    }
}
