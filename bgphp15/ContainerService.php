<?php

namespace Bgphp;

Class ContainerService
{

    public function fetch($id)
    {
        $faker = \Faker\Factory::create();
        return [
            'container' => $id,
            'latitude' => $faker->latitude,
            'longitude' => $faker->longitude,
            'destination' => $faker->countryCode,
        ];
    }

    public function fetchAll()
    {

    }

    public function store($id)
    {

    }
}