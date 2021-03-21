<?php

namespace Database\Factories;

use App\Models\Ingredient;
use App\Models\RecipeIngredient;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeIngredientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RecipeIngredient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ingredient = Ingredient::firstOrCreate(['name' => $this->faker->ingredient]);
        $measurement = explode(' ', $this->faker->measurement, 2);
        $quantity = $measurement[0];
        $unit = $measurement[1];

        return [
            'ingredient_id' => $ingredient->id,
            'quantity' => $quantity,
            'unit_id' => Unit::firstOrCreate(['name' => $unit])
        ];
    }
}
