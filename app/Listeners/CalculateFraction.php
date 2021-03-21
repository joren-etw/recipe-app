<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Phospr\Fraction;

class CalculateFraction
{
    static function handle(string $fraction, int $multiplier)
    {
        Log::debug($fraction);
        // Check if value is indeed a fraction
        if (strpos($fraction, '/') === false) {
            return $fraction * $multiplier;
        }

        $fraction = new Fraction(...array_map('intval', explode('/', $fraction)));

        if ($fraction->isInteger()) {
            return $fraction * $multiplier;
        }

        Log::debug('Wil multiply with ' . $multiplier);

        return $fraction->multiply(new Fraction($multiplier, 1));
    }
}
