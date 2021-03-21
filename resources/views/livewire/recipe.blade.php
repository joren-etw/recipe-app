<div>
    <div class="card" style="width: 100%;">
        <div class="card-body">
            <div class="card-title">
                <div class="float-start">
                    <h5>{{ $recipe->name }}</h5>
                    <span class="badge bg-info">{{ $recipe->category->name }}</span>
                </div>
                <div class="form-group float-end">
                    <label for="search-recipe">Amount of people</label>
                    <input wire:model.debounce.300ms="people" type="text" class="form-control" id="search-recipe">
                </div>
            </div>
        </div>
        <ul class="list-group list-group-flush">
            @foreach($recipe->ingredients as $ingredient)
            <li class="list-group-item">
                <span class="float-start">
                    {{ $ingredient->ingredient->name }}
                </span>
                <span class="float-end">
                    {{ $ingredient->calculated_quantity . ' ' . $ingredient->unit->name }}
                </span>
            </li>
            @endforeach
        </ul>
        <div class="row">
            @foreach($relatedRecipes as $relatedRecipe)
            <div class="col-12 col-md-6">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title float-start">
                                {{ $relatedRecipe->name }}
                            </h5>
                            <span class="float-end">
                                <button wire:click="openRecipe({{ $relatedRecipe->id }})" class="btn btn-info btn-sm">View</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
