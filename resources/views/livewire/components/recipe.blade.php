<div>
    <div class="card" style="width: 100%;">
        <div class="card-body">
            <div class="card-title">
                <h5 class="float-start">{{ $recipe->name }}</h5>
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
    </div>
</div>
