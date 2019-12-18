<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\transaksi::class, function (Faker $faker) {
    return [
        'pelanggan_id' => rand(2,11),
        'menu_id' => rand(1,41),
        'jumlah' => rand(1,5)
    ];
});
