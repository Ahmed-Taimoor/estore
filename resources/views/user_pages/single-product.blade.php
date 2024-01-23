@extends('layouts.app')

@section('content')
    @include('components.nav.nav')
    <main class="main-wrapper">
        <!-- Start Shop Area  -->
        <div class="axil-single-product-area bg-color-white">
            <div class="single-product-thumb axil-section-gap pb--20 pb_sm--0 bg-vista-white">
                <div class="container">
                    <div class="row row--25">
                        <div class="col-lg-6 mb--40">
                            <div class="h-100">
                                <div class="position-sticky sticky-top">
                                    <div class="row row--10">
                                        @foreach ($product[0]->images as $item)
                                            <div class="col-6 mb--20">
                                                <div class="single-product-thumbnail axil-product thumbnail-grid">
                                                    <div class="thumbnail">
                                                        <img class="img-fluid" src="{{ asset($item->path) }}"
                                                            alt="Product Images">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        <!-- End .col -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb--40">
                            <div class="h-100">
                                <div class="position-sticky sticky-top">
                                    <div class="single-product-content">
                                        <div class="inner">
                                            <h2 class="product-title"> {{ $product[0]->name }}</h2>
                                            <span class="price-amount">${{ $product[0]->price }}</span>
                                            <div class="product-rating">
                                                <div class="star-rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <div class="review-link">
                                                    <a href="#">(<span>2</span> customer reviews)</a>
                                                </div>
                                            </div>
                                            <ul class="product-meta">
                                                <li><i class="fal fa-check"></i>In stock</li>
                                                <li><i class="fal fa-check"></i>Free delivery available</li>
                                                <li><i class="fal fa-check"></i>Sales 30% Off Use Code: MOTIVE30</li>
                                            </ul>
                                            <p class="description">In ornare lorem ut est dapibus, ut tincidunt nisi
                                                pretium. Integer ante est, hendrerit in rutrum quis, elementum eget magna.
                                                Pellentesque sagittis dictum libero, eu dignissim tellus.</p>

                                            <div class="product-variations-wrapper">





                                            </div>

                                            <!-- Start Product Action Wrapper  -->
                                            <div class="product-action-wrapper d-flex-center">
                                                <!-- Start Quentity Action  -->
                                                <div class="pro-qty mr--20"><input type="text" value="1"></div>
                                                <!-- End Quentity Action  -->

                                                <!-- Start Product Action  -->
                                                <ul class="product-action d-flex-center mb--0">
                                                    <li class="add-to-cart">
                                                        <form action="{{ route('addtocart') }}" class="addToCartForm">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $product[0]->id }}">
                                                            <button type="submit"
                                                                class="addToCartBtn axil-btn btn-bg-primary"
                                                                data-product-id="{{ $product[0]->id }}">
                                                                Add
                                                                to
                                                                Cart</button>
                                                        </form>

                                                    </li>
                                                    <li class="wishlist"><a href="wishlist.html"
                                                            class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                                <!-- End Product Action  -->

                                            </div>
                                            <!-- End Product Action Wrapper  -->

                                            <div class="product-desc-wrapper pt--80 pt_sm--60">
                                                <h4 class="primary-color mb--40 desc-heading">Description</h4>
                                                <div class="single-desc mb--30">
                                                    <p>{{ $product[0]->description }}</p>
                                                </div>
                                                <ul class="pro-des-features pro-desc-style-two">
                                                    <li class="single-features">
                                                        <div class="icon">
                                                            <img src="assets/images/service3.png" alt="icon">
                                                        </div>
                                                        Easy Returns
                                                    </li>
                                                    <li class="single-features">
                                                        <div class="icon">
                                                            <img src="assets/images/service2.png" alt="icon">
                                                        </div>
                                                        Quality Service
                                                    </li>
                                                    <li class="single-features">
                                                        <div class="icon">
                                                            <img src="assets/images/service1.png" alt="icon">
                                                        </div>
                                                        Original Product
                                                    </li>
                                                </ul>
                                                <!-- End .pro-des-features -->
                                            </div>
                                            <!-- End .product-desc-wrapper -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </main>
@endsection
