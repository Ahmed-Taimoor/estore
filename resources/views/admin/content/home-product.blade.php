<div>


    <div>
        <form>
            @csrf
            <div class="form-group">
                <label for="titleFeaturedProduct">Select Featured Category</label>
                <select class="form-control" wire:model="titleFeaturedProduct">
                    <option value="">Please Select the Category</option>

                    @foreach ($featuredProducts as $featuredProduct)
                        <option value="{{ $featuredProduct->value }}">{{ $featuredProduct->key }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div wire:ignore>
                <select id="mySelect" wire:model='fetaturedProducts' multiple="multiple">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" data-img-src="{{ asset($product->titleImage->path) }}">
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="button" class="btn btn-primary mt-3 " wire:click='addProducts'>Submit</button>

        </form>
    </div>


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
        $(document).ready(function() {
            console.log("hi")

            $('#mySelect').select2({
                templateResult: formatOption, // Custom function for displaying images
                escapeMarkup: function(m) {
                    return m;
                } // Prevents markup escaping
            });

            // Custom function to display images in the dropdown
            function formatOption(option) {
                if (!option.id) {
                    return option.text;
                }
                var $option = $(
                    '<span><img src="' + $(option.element).data('img-src') + '" class="img-flag" /> ' + option
                    .text + '</span>'
                );
                return $option;
            }
            $('#mySelect').on('change', function() {

                var selectedValues = $(this).val();
                console.log(selectedValues);
                @this.set('fetaturedProducts', selectedValues);
            });
        });
    </script>
@endscript
