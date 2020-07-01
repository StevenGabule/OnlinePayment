<?php

use App\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = ['usd', 'eur', 'gbp', 'jpy', 'php'];
        foreach ($currencies as $currency) {
            Currency::create(['iso' => $currency]);
        }
    }
}
