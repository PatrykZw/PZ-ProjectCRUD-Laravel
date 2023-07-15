<?php

namespace App\Enums\Car;

class Fuel
{
    const Electric = 'Electric';
    const Hybrid = 'Hybrid';
    const Petrol = 'Petrol';
    const Oil = 'Oil';




    const TYPES = [
        self::Electric,
        self::Hybrid,
        self::Petrol,
        self::Oil
    ];

}