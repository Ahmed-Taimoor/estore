@foreach ($newArrivalProducts as $newArrivalProduct)
    <div class="slick-single-layout">
        <div class="axil-product product-style-four">
            <div class="thumbnail">

                <a href="{{ route('viewproduct', ['id' => $newArrivalProduct->product->id]) }}">

                    <img src="{{ $newArrivalProduct->product->titleImage->path }}" alt="Product Images">
                    <img class="hover-img" src="{{ $newArrivalProduct->product->titleImage->path }}" alt="Product Images">
                </a>


                {{-- <div class="label-block label-right">
                    <div class="product-badget">20% OFF</div>
                </div> --}}
                <div class="product-hover-action">
                    <ul class="cart-action">
                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                        <li class="select-option">
                            <form action="{{ route('addtocart') }}" class="addToCartForm">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $newArrivalProduct->product->id }}">
                                <button type="submit" class="addToCartBtn"
                                    data-product-id="{{ $newArrivalProduct->product->id }}"> Add to
                                    Cart</button>
                            </form>
                        </li>
                        <li class="quickview"><a
                                href="{{ route('viewproduct', ['id' => $newArrivalProduct->product->id]) }}"><i
                                    class="far fa-eye"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="product-content">
                <div class="inner">
                    <h5 class="title"><a
                            href="{{ route('viewproduct', ['id' => $newArrivalProduct->product->id]) }}">{{ $newArrivalProduct->product->name }}</a>
                    </h5>
                    <div class="product-price-variant">
                        {{-- <span class="price old-price">$80</span> --}}
                        <span class="price current-price">${{ $newArrivalProduct->product->price }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
