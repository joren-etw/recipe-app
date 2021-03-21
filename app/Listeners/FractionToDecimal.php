<?php

namespace App\Listeners;

class FractionToDecimal
{
    static function handle($fraction)
    {
        // Check if value is indeed a fraction
        if (strpos($fraction, '/') === false) {
            return $fraction;
        }

        // Split fraction into whole number and fraction components
        preg_match('/^(?P<whole>\d+)?\s?((?P<numerator>\d+)\/(?P<denominator>\d+))?$/', $fraction, $components);

        // Extract whole number, numerator, and denominator components
        $whole = $components['whole'] ?: 0;
        $numerator = $components['numerator'] ?: 0;
        $denominator = $components['denominator'] ?: 0;

        // Create decimal value
        $decimal = $whole;
        $numerator && $denominator && $decimal += ($numerator / $denominator);

        return $decimal;
    }
}
