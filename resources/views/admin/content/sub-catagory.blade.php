<div>
    <form>
        @csrf
        <div class="form-group">
            <label for="selectedCategory">Select Category</label>
            <select class="form-control" wire:model="selectedCategory">
                <option value="">Please Select the Category</option>
                @foreach ($category as $cat)
                    <option wire:key="{{ $cat->id }}" value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            @error('selectedCategory')
                <span class="text-sm text-danger"> {{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mt-4" wire:ignore>
            <label class="form-label" for="catagoryname">Subcategory Name</label>

            <select wire:model="categeryname" id="categoryName" class="js-example-basic-multiple w-100 h-100"
                multiple="multiple">

            </select>
        </div>
        @error('categeryname')
            <span class="text-sm text-danger"> {{ $message }}</span>
        @enderror

        <button type="button" wire:click="submit" class="btn btn-primary mt-3">Submit</button>
    </form>

    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">SubCategory ID</th>
                <th scope="col">SubCategory Name</th>
                <th scope="col">Category Name</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($category as $cat)
                @foreach ($cat->subCategories as $subCat)
                    <tr>
                        <td>{{ $subCat->id }}</td>
                        <td>{{ $subCat->name }}</td>
                        <td>{{ $cat->name }}</td>
                        <td>
                            <a class="btn btn-primary"
                                wire:click="categoryAction({ id: {{ $subCat->id }} },'edit')">Edit</a>
                        </td>
                        <td> <a class="btn btn-danger"
                                wire:click="categoryAction({ id: {{ $subCat->id }} },'delete')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @endforeach



        </tbody>
    </table>




    <!-- Modal -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Subcategory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label" for="">Subcategory
                                Name</label>
                            <input class="form-control" id="" wire:model="updatedSubcatagoryName"
                                type="text">
                            {{-- @error('updatedCatagoryName')
                                <span class="text-sm text-danger"> {{ $message }}</span>
                            @enderror --}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" wire:click='updateSubcategory'>Save
                            changes</button>
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
                        <button type="button" class="btn btn-danger" wire:click='deleteSubcategory'>Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@script
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                tags: true,
                tokenSeparators: [','],
            });

            $('#categoryName').on('change', function() {

                var selectedValues = $(this).val();

                console.log(selectedValues);

                @this.set('categeryname', selectedValues);
            });
        });
        $wire.on('action-done', (event) => {
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
            console.log(data[0].modelName)
            $(data[0].modelName).modal('hide');
        });
    </script>
@endscript
