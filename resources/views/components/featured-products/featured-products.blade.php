<div class="axil-main-slider-area main-slider-style-2">
    <div class="container">
        <div class="slider-offset-left">
            <div class="row row--20">
                <div class="col-lg-9">
                    <div class="slider-box-wrap">
                        <div class="slider-activation-one axil-slick-dots">
                            @foreach ($featuredProducts as $featuredProduct)
                                <div class="single-slide slick-slide">
                                    <div class="main-slider-content">
                                        <h1 class="title">{{ $featuredProduct->product->name }}</h1>
                                        <div class="shop-btn">
                                            <a href="{{ route('viewproduct', ['id' => $featuredProduct->product->id]) }}"
                                                class="axil-btn">Shop Now <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="main-slider-thumb">
                                        <img src= "{{ $featuredProduct->product->titleImage->path }}"alt="Product">
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="slider-product-box">
                        <div class="product-thumb">
                            <a href="{{ route('viewproduct', ['id' => $featuredProducts->first()->product->id]) }}">
                                <img src="{{ $featuredProducts->first()->product->titleImage->path }}" alt="Product">
                            </a>
                        </div>
                        <h6 class="title"><a
                                href="{{ route('viewproduct', ['id' => $featuredProducts->first()->product->id]) }}">
                                {{ $featuredProducts->first()->product->name }}</a>
                        </h6>
                        <span class="price">${{ $featuredProducts->first()->product->price }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
