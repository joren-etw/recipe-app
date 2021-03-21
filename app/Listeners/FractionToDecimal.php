<?php

namespace App\Listeners;

use Phospr\Fraction;

class FractionToDecimal
{
    static function handle($fraction)
    {
        // Check if value is indeed a fraction
        if (strpos($fraction, '/') === false) {
            return $fraction;
        }

        $fraction = new Fraction((int)explode('/', $fraction)[0], (int)explode('/', $fraction)[1]);

        return $fraction->toFloat();
    }
}
