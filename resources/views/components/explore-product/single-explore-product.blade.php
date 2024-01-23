@foreach ($exploreProducts as $exploreProduct)
    <div class="slick-single-layout">
        <div class="axil-product product-style-two has-color-pick">
            <div class="thumbnail">
                <a href="{{ route('viewproduct', ['id' => $exploreProduct->product->id]) }}">
                    <img src="{{ $exploreProduct->product->titleImage->path }}" alt="Product Images">
                </a>
                {{-- <div class="label-block label-right">
                    <div class="product-badget">50% OFF</div>
                </div> --}}
            </div>
            <div class="product-content">
                <div class="inner">
                    <div class="color-variant-wrapper">
                        <ul class="color-variant">
                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                            </li>

                        </ul>
                    </div>
                    <h5 class="title"><a
                            href="{{ route('viewproduct', ['id' => $exploreProduct->product->id]) }}">{{ $exploreProduct->product->name }}</a>
                    </h5>
                    <div class="product-price-variant">
                        {{-- <span class="price old-price">$50</span> --}}
                        <span class="price current-price">{{ $exploreProduct->product->price }}</span>
                    </div>
                </div>
                <div class="product-hover-action">
                    <ul class="cart-action justify-content-center">
                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                        </li>
                        <li class="select-option">
                            <form action="{{ route('addtocart') }}" class="addToCartForm">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $exploreProduct->product->id }}">
                                <button type="submit" class="addToCartBtn"
                                    data-product-id="{{ $exploreProduct->product->id }}"> Add to
                                    Cart</button>
                            </form>
                        </li>
                        <li class="quickview"><a
                                href="{{ route('viewproduct', ['id' => $exploreProduct->product->id]) }}"><i
                                    class="far fa-eye"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endforeach
