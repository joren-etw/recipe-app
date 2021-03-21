<div>
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
            <tr>
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
