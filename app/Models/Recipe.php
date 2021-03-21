<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $appends = ['amount_of_people'];

    public function ingredients()
    {
        return $this->hasMany(RecipeIngredient::class);
    }

    /**
     * Set the amount of people for this model, this will modify the quantities returned
     *
     * @param mixed $value
     *
     * @return [type]
     */
    public function setAmountOfPeopleAttribute($value)
    {
        $this->attributes['amount_of_people'] = $value;

        $this->ingredients->map(static function ($ingredient) use ($value) {
            $ingredient->setCalculatedQuantity($value);
        });
    }
}
