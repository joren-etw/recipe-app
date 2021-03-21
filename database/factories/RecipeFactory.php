<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Recipe;
use App\Models\RecipeIngredient;
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
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Recipe $recipe) {
            RecipeIngredient::factory([
                'recipe_id' => $recipe->id,
            ])
                ->count(random_int(1, 15))
                ->create();
        });
    }

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
            'category_id' => Category::inRandomOrder()->first()->id,
            'recipe_description' => $this->faker->text(),
            'active' => (random_int(0, 100) < 90),
            'minutes' => ceil(random_int(0, 60) / 5) * 5
        ];
    }
}
