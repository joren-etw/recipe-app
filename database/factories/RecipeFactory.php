<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Recipe;
use FakerRestaurant\Provider\en_US\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new Restaurant($this->faker));

        return [
            'name' => $this->faker->foodName(),
            'category_id' => Category::inRandomOrder()->first()->id
        ];
    }
}
