<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class Recipes extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search, $perPage = 10, $category;

    protected $queryString = [
        'perPage',
        'search' => ['except' => ''],
        'category' => ['except' => '0']
    ];

    public function render()
    {
        $categories = Category::all();

        $recipes = Recipe::category($this->category)
            ->filter($this->search)
            ->paginate($this->perPage);

        return view('livewire.recipes', [
            'recipes' => $recipes,
            'categories' => $categories
        ]);
    }

    public function openRecipe($recipeId)
    {
        return redirect()->to('/' . $recipeId);
    }
}
