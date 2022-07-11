<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TransactionTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group transaction
     * @return void
     * 
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'customer11@gmail.com')
                    ->type('password', 'customer123')
                    ->press('Login')
                    ->assertPathIs('/beranda')
                    ->visit('/produk')
                    ->press('Beli Sekarang')
                    ->type('qty', '1')
                    ->attach('bukti_pembayaran', public_path('storage\foto\fotoprofil.jpg'))
                    ->type('alamat_pengiriman', 'Jl.Telekomunikasi')
                    ->type('catatan', 'no')
                    ->press('Checkout')
                    ->assertPathIs('/transaction');
        });
    }
}
