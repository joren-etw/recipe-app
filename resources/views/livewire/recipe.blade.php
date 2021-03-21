<div>
    <div class="card" style="width: 100%;">
        <div class="card-body">
            <div class="card-title">
                <div class="row">
                    <div class="col-12">
                        <div class="float-start">

                            <h5 class="float-start">{{ $recipe->name }}</h5>
                            <div class="float-start mx-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                                    <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z" />
                                    <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z" />
                                </svg>&nbsp;{{ $recipe->minutes . ' minutes' }}
                            </div>
                        </div>
                        <div class="form-group float-end">
                            <label for="search-recipe">Amount of people</label>
                            <input wire:model.debounce.300ms="people" type="text" class="form-control" id="search-recipe">
                        </div>
                    </div>
                    <div class="col-12">
                        <span class="badge bg-info">{{ $recipe->category->name }}</span>
                    </div>
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
        <div class="card-body">
            <div class="card-title">
                <h6>How to make it:</h6>
            </div>
            {{ $recipe->recipe_description }}
        </div>
        <div class="card-body">
            <div class="card-title">
                <h6>Related recipes: </h6>
            </div>
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
                                    <button wire:click="openRecipe({{ $relatedRecipe->id }})" class="btn btn-info text-white btn-sm">View</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
