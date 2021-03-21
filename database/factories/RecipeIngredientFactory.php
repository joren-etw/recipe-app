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
     * With random generated recipes, cups make more sense (like, I got 100ml of turkey at some point, which is... weird)
     * However we live in Belgium and don't (really) use cups, so I made an additional modification. Both are possible to do
     * The active one gives litres and grammes, the inactive one gives cups and stuff
     *
     * @return array
     */
    public function definition()
    {
        $ingredient = Ingredient::firstOrCreate(['name' => $this->faker->ingredient]);

        $measurement = $this->measurement();
        $unit = $measurement['unit'];
        $quantity = $this->faker->randomElement($measurement['measurements']);

        // $measurement = explode(' ', $this->faker->measurement, 2);
        // $quantity = $measurement[0];
        // $unit = $measurement[1];

        return [
            'ingredient_id' => $ingredient->id,
            'quantity' => $quantity,
            'unit_id' => Unit::firstOrCreate(['name' => $unit])
        ];
    }

    private function measurement()
    {
        $lgMeasurementSizes = ["50", "100", "200", "300", "500"];
        $smMeasurementSizes = ["1", "2", "3"];

        $measurements = [
            [
                "unit" => "tsp",
                "measurements" => $smMeasurementSizes
            ], [
                "unit" => "tbsp",
                "measurements" => $smMeasurementSizes
            ],
            [
                "unit" => "g",
                "measurements" => $lgMeasurementSizes
            ],
            [
                "unit" => "ml",
                "measurements" => $lgMeasurementSizes
            ]
        ];

        return $this->faker->randomElement($measurements);
    }
}
