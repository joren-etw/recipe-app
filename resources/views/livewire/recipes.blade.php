<div>
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="form-group">
                <label for="search-recipe">Search recipe</label>
                <input wire:model.debounce.300ms="search" type="text" class="form-control" id="search-recipe">
            </div>
        </div>
        <div class="col-12 col-md-4">
            <label for="search-recipe">Search category</label>
            <select wire:model="category" class="form-select" aria-label="Default select example">
                <option value="0">All categories</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-md-4">
            <label for="show-per-page">Per page</label>
            <select wire:model="perPage" class="form-select" id="show-per-page" aria-label="Default select example">
                <option>10</option>
                <option>20</option>
                <option>50</option>
            </select>
        </div>
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recipes as $recipe)
                <tr wire:key="{{time() . $recipe->id}}">
                    <td>{{ $recipe->id }}</td>
                    <td>{{ $recipe->name }}</td>
                    <td>{{ $recipe->category->name }}</td>
                    <td>
                        <button wire:click="openRecipe({{ $recipe->id }})" class="btn btn-info btn-sm">View</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $recipes->links() !!}
    </div>
</div>
