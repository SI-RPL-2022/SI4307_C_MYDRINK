<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class productTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group product
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'admin@admin.com')
                    ->type('password', 'admin123')
                    ->press('Login')
                    ->assertPathIs('/home')
                    // ->loginAs(User::find(1))
                    ->visit('/product/create')
                    ->type('nama', 'Bubuk kopi')
                    ->type('harga', '10000')
                    // ->attach('foto', __DIR__.'../storage/foto/fotoprofil.jpg')
                    ->type('deskripsi', 'ini adalah bubuk kopi')
                    ->press('Submit');
                    // ->assertSee('+ Tambah produk')
                    
        });
    }
}
