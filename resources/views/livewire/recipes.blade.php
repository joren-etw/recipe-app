<div>
    <div class="row">
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recipes as $recipe)
                <tr wire:key="{{time() . $recipe->id}}">
                    <td>{{ $recipe->id }}</td>
                    <td>{{ $recipe->name }}</td>
                    <td>
                        <button class="btn btn-info btn-sm">View</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
