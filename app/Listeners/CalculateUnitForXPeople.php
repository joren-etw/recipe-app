<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Phospr\Fraction;

class CalculateUnitForXPeople
{
    /**
     * Will multiply given fraction with given multiplier. If fraction is not really a fraction it will be handled as a regular calculation
     *
     * @param string $fraction
     * @param int $multiplier
     *
     * @return string
     */
    static function handle(string $quantity, int $multiplier): string
    {
        // Check if value is a fraction
        if (strpos($quantity, '/') === false) {
            return $quantity * $multiplier;
        }

        $fraction = new Fraction(...array_map('intval', explode('/', $quantity)));

        if ($fraction->isInteger()) {
            return $fraction * $multiplier;
        }

        Log::debug('Wil multiply with ' . $multiplier);

        return $fraction->multiply(new Fraction($multiplier, 1));
    }
}
