<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Carbon\Carbon;

class FormTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testForm(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->within('form', function ($form) {
                    $form->value('input[name=company_name]', 'Atlantic American Corporation');
                    $form->value('input[name=email]', 'wajahathussain444@gmail.com');
                    $form->select('symbol', [
                        'AAME' => 'AAME',
                    ]);
                    $form->value('input[name=start_date]',  Carbon::today()->format('Y-m-d'));
                    $form->value('input[name=end_date]',  Carbon::today()->format('Y-m-d'));
                })
                ->press('Send')
                ->assertPathIs('/show/AAME');
        });
    }
}

