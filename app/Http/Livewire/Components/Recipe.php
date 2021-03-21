<?php

namespace App\Http\Livewire\Components;

use App\Models\Recipe as RecipeModel;
use Livewire\Component;

class Recipe extends Component
{

    public $recipe, $people = 2, $relatedRecipes;

    public function mount($id)
    {
        $this->recipe = RecipeModel::find($id);
        $this->relatedRecipes = RecipeModel::where('id', '<>', $id)->where('category_id', $this->recipe->category_id)->limit(4)->get();
    }


    public function render()
    {
        $this->recipe->amount_of_people = $this->people;
        return view('livewire.components.recipe', [
            'recipe' => $this->recipe,
            'relatedRecipes' => $this->relatedRecipes
        ]);
    }

    public function openRecipe($recipeId)
    {
        // Would be better to be emitted on recipes component
        return redirect()->to('/' . $recipeId);
    }
}
