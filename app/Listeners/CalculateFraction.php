<?php

namespace App\Listeners;

use Phospr\Fraction;

class CalculateFraction
{
    static function handle($fraction, $multiplier)
    {
        // Check if value is indeed a fraction
        if (strpos($fraction, '/') === false) {
            return $fraction * $multiplier;
        }

        $fraction = new Fraction((int)explode('/', $fraction)[0], (int)explode('/', $fraction)[1]);

        if ($fraction->isInteger()) {
            return $fraction * $multiplier;
        }

        return $fraction->multiply(new Fraction($multiplier, 1));
    }
}
