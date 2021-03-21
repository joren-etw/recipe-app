<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    use HasFactory;

    protected $appends = ['calculated_quantity'];

    /**
     * Set calculated quantity value
     *
     * @param mixed $value
     *
     * @return [type]
     */
    public function setCalculatedQuantity($amountOfPeople)
    {
        $this->attributes['calculated_quantity'] = $this->quantity * $amountOfPeople;
    }
}
