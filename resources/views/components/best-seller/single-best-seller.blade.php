@foreach ($bestSellerProducts as $bestSellerProduct)
    <div class="slick-single-layout">
        <div class="axil-product product-style-seven">
            <div class="product-content">
                <div class="cart-btn">

                    <form action="{{ route('addtocart') }}" class="addToCartForm">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $bestSellerProduct->product->id }}">
                        <button type="submit" class="addToCartBtn"> <i class="flaticon-shopping-cart"></i></button>
                    </form>
                </div>
                <div class="inner">
                    <h5 class="title"><a
                            href="{{ route('viewproduct', ['id' => $bestSellerProduct->product->id]) }}">{{ $bestSellerProduct->product->name }}</a>
                    </h5>
                    <div class="product-price-variant">
                        {{-- <span class="price old-price">$29.99</span> --}}
                        <span class="price current-price ">${{ $bestSellerProduct->product->price }}</span>
                    </div>
                    <div class="product-rating">
                        <span class="icon">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                        <span class="rating-number">(64)</span>
                    </div>
                </div>
            </div>
            <div class="thumbnail">
                <a href="{{ route('viewproduct', ['id' => $bestSellerProduct->product->id]) }}">
                    <img src="{{ $bestSellerProduct->product->titleImage->path }}" alt="Product Images">
                </a>
            </div>
        </div>
    </div>
@endforeach
