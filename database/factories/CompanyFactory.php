<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Company::class, function (Faker $faker) {
    return [
        'name' => $this->faker->name,
        'email' => $this->faker->unique()->safeEmail,
        'website' => $this->faker->domainName,
        'logo' => 'teste'
    ];
});
