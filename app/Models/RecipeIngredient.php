<?php

namespace App\Models;

use App\Listeners\CalculateFraction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    use HasFactory;

    protected $with = ['ingredient', 'unit'];

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    /**
     * Set calculated quantity value
     *
     * @param mixed $value
     *
     * @return [type]
     */
    public function setCalculatedQuantityAttribute($amountOfPeople)
    {
        $this->attributes['calculated_quantity'] = CalculateFraction::handle($this->quantity, $amountOfPeople);
    }
}
