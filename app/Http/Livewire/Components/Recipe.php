<?php

namespace App\Http\Livewire\Components;

use App\Models\Recipe as RecipeModel;
use Livewire\Component;

class Recipe extends Component
{

    public $recipe, $people = 2;

    public function mount($id)
    {
        $this->recipe = RecipeModel::find($id);
    }


    public function render()
    {
        $this->recipe->amount_of_people = $this->people;
        return view('livewire.components.recipe', ['recipe' => $this->recipe]);
    }
}
