<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Phospr\Fraction;

class CalculateFraction
{
    /**
     * Will multiply given fraction with given multiplier. If fraction is not really a fraction it will be handled as a regular calculation
     *
     * @param string $fraction
     * @param int $multiplier
     *
     * @return string
     */
    static function handle(string $fraction, int $multiplier): string
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
