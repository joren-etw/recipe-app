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

    public function render()
    {
        $recipes = Recipe::paginate($this->perPage);

        return view('livewire.recipes', [
            'recipes' => $recipes,
        ]);
    }
}
