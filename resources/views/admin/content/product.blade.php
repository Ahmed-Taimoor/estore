<div>
    @if (!$isChecked)

        <button class="btn btn-primary px-2 py-1 mb-3" wire:click="toogleProductsSection">Edit Products</button>

        <form>
            <div class="form-group">
                <label for="category">Category:</label>

                <select wire:model.live="selectedCategory" id="selectedCategory" class="form-control">

                    <option value="">Select Category</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>
            </div>

            @if ($selectedCategory)
                <div class="form-group">
                    <label for="subcategory">Subcategory:</label>
                    <select wire:model.live="selectedSubcategory" id="selectedSubcategory" class="form-control">

                        <option disabled selected value="">Select Subcategory</option>

                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach

                    </select>
                </div>
            @endif

            @if ($selectedCategory && $selectedSubcategory)
                <div class=" vh-100 ">
                    <div class="form-group">
                        <label for="productName">Product Name:</label>
                        <input type="text" wire:model="productName" class="form-control">
                    </div>
                    @error('productName')
                        <span class="text-sm text-danger"> {{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="productPrice">Product Price:</label>
                        <input type="text" wire:model="productPrice" class="form-control">
                    </div>
                    @error('productPrice')
                        <span class="text-sm text-danger"> {{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="productDesc">Product Description:</label>
                        <textarea class="form-control" wire:model="productDesc" id="" cols="30" rows="10"></textarea>
                    </div>
                    @error('productDesc')
                        <span class="text-sm text-danger"> {{ $message }}</span>
                    @enderror

                    <div class="form-group">
                        <label for="" class="font-weight-bold">Title Image</label>
                        <input type="file" class="d-block" wire:model="titleImage" multiple>

                        @error('titleImage.type*')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror

                    </div>


                    <div wire:loading wire:target="titleImage">Uploading Image...</div>
                    @if (!empty($titleImage))
                        <div class="mb-3">
                            <img src="{{ $titleImage[0]->temporaryUrl() }}" alt="" style="height:100px">
                        </div>
                    @endif

                    <div class="form-group">
                        <label class="font-weight-bold">Product's Other Images</label>
                        <input type="file" class="d-block" wire:model="slides" multiple>

                        @error('slides.type*')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror

                    </div>

                    <!-- Loading Message for Images -->

                    <div wire:loading wire:target="slides">Uploading Slide Images...</div>
                    @if (!empty($slides))
                        <div class="mb-3">
                            @foreach ($slides as $slide)
                                <img src="{{ $slide->temporaryUrl() }}" alt="" style="height:100px">
                            @endforeach
                        </div>
                    @endif



                    <button type="button" wire:click='saveProduct' class="btn btn-primary mb-5 py-1">Save
                        Product</button>

                </div>
            @endif

        </form>

    @endif
    @if ($isChecked)
        <button class="btn btn-primary px-2 py-1 mb-3" wire:click="toogleProductsSection">Add Products</button>
        <div class="d-flex justify-content-between">
            <input wire:model.live="searchBook" class="form-control mr-sm-2 w-25 d-inline" type="search"
                placeholder="Search" aria-label="Search">

            <div class="form-group">
                <select wire:model.live="sCategoryProducts" class="form-control">

                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>
            </div>

            <div class=" d-inline"> {{ $products->links() }}</div>

        </div>
        <div class="row justify-content-around ">
            @foreach ($products as $product)
                <div class=" col-3">
                    <div class="card mb-3" style="max-width: 18rem;">
                        <img src="{{ asset($product->titleImage->path) }}" class="card-img-top" style="height: 200px"
                            alt="...">

                        @if ($product->titleImage)
                            {{-- {{storage $product->titleImage->path }} --}}
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>

                            <a class="btn btn-primary"
                                wire:click="productAction({ id: {{ $product->id }} },'edit')">Edit</a>
                            <a class="btn btn-danger"
                                wire:click="productAction({ id: {{ $product->id }} },'delete')">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>




        <!-- Modal -->
        <div class="modal fade" id="editModal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form>
                        @csrf
                        <div class="modal-body">
                            <div class=" vh-100 ">
                                <div class="form-group">
                                    <label for="productName">Product Name:</label>
                                    <input type="text" wire:model="productName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="productPrice">Product Price:</label>
                                    <input type="text" wire:model="productPrice" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="productDesc">Product Description:</label>
                                    <textarea class="form-control" wire:model="productDesc" id="" cols="30" rows="10"></textarea>
                                </div>


                                <button type="button" wire:click='updateProduct'
                                    class="btn btn-primary mb-5 py-1">Save
                                    Product</button>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form>
                        @csrf
                        <div class="modal-body">
                            The action can't be undone, result will delete all the subcategories and products
                            associated with this category.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" wire:click='deleteProduct'>Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    @endif
</div>
@script
    <script>
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
