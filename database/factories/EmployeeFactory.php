<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Employee::class, function (Faker $faker) {
    return [
        'name' => $this->faker->name,
        'last_name' => $this->faker->name,
        'email' => $this->faker->unique()->safeEmail,
        'phone'=> $this->faker->phoneNumber,
    ];
});
