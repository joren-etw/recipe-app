<?php

namespace Tests\Feature;

use App\Listeners\CalculateUnitForXPeople;
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
    public function testRecipeIngredientAmountOfPeople()
    {
        // Assert values of 10 recipes
        $recipes = Recipe::inRandomOrder()->limit(10)->get();

        foreach ($recipes as $recipe) {
            $amountOfPeople = random_int(2, 25);
            // This handling is expected to trigger the calculated_quantity to be calculated
            $recipe->amount_of_people = $amountOfPeople;

            foreach ($recipe->ingredients as $ingredient) {
                $expectedQuantity = CalculateUnitForXPeople::handle($ingredient->quantity, $amountOfPeople);
                $this->assertTrue($ingredient->calculated_quantity === $expectedQuantity);
            }
        }
    }
}
