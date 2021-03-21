<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Recipe;
use Livewire\Component;

class Recipes extends Component
{
    public $recipes, $description, $categoryId, $page;

    public function render()
    {
        // $this->recipes = Recipe::all();
        // $this->categories = Category::all();
        return view('livewire.recipes');
    }
}
