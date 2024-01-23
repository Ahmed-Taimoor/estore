<div>
    <form>
        @csrf

        <div class="form-group">
            <label class="form-label" for="catagoryname">Catagory Name</label>
            <input class="form-control" wire:model="catagoryname" type="text">
            @error('catagoryname')
                <span class="text-sm text-danger"> {{ $message }}</span>
            @enderror
        </div>
        <button type="button" wire:click="addCategory" class="btn btn-primary mt-3">Submit</button>


    </form>

    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">Category ID</th>
                <th scope="col">Category Name</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($category as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td> {{ $cat->name }}</td>
                    <td>
                        <a class="btn btn-primary"
                            wire:click="categoryAction({ id: {{ $cat->id }} },'edit')">Edit</a>
                    </td>
                    <td> <a class="btn btn-danger"
                            wire:click="categoryAction({ id: {{ $cat->id }} },'delete')">Delete</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>



    <!-- Modal -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label" for="updatedCatagoryName">Add Category
                                Name</label>
                            <input class="form-control" id="updatedCatagoryName" wire:model="updatedCatagoryName"
                                type="text">
                            @error('updatedCatagoryName')
                                <span class="text-sm text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" wire:click='updateCategory'>Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModal">Confirm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    @csrf
                    <div class="modal-body">
                        The action can't be undone, result will delete all the subcategories and products
                        associated with this category.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" wire:click='deleteCategory'>Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @script
        <script>
            $wire.on('category-created', (event) => {
                swal.fire({
                    title: event[0].message,
                    text: event[0].text,
                    icon: event[0].type,
                });
            });
            $wire.on('openModal', function(data) {
                $(data[0].modelName).modal('show');
            });
            $wire.on('close', function(data) {
                $(data[0].modelName).modal('hide');
            });
        </script>
    @endscript
