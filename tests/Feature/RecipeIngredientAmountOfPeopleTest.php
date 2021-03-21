<?php

namespace Tests\Feature;

use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RecipeIngredientAmountOfPeopleTest extends TestCase
{
    /**
     * Changing amount of people on recipe model should trigger calculated_quantity to be set, I want to assert these values
     *
     * @return void
     */
    public function RecipeIngredientAmountOfPeopleTest()
    {
        $recipe = Recipe::inRandomOrder()->first();
        $recipe->amount_of_people = random_int(2, 25);

        foreach ($recipe->ingredients as $ingredient) {
            $expectedQuantity = $ingredient->quantity * $recipe->amount_of_people;
            $this->assertTrue($ingredient->calculated_quantity === $expectedQuantity);
        }
    }
}
