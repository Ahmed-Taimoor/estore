    @extends('layouts.app')

    @section('content')
        <div>

            <a href="#top" class="back-to-top" id="backto-top"><i class="fa fa-arrow-up"></i></a>

            <header class="header axil-header header-style-2">
                {{--
        ************************************************************
        ************************************************************
        ************************************************************
                        Top Header Campaign
        ************************************************************
        ************************************************************
        ************************************************************
        --}}
                <div class="header-top-campaign">
                    <div class="container position-relative">
                        <div class="campaign-content">
                            <div class="campaign-countdown"></div>
                            <p>Open Doors To A World Of fahion Get <a href="#">Get Your Offer</a></p>
                        </div>
                    </div>
                    <button class="remove-campaign"><i class="fa fa-times"></i></button>
                </div>

                {{--
        /************************************************************
        ************************************************************
        ************************************************************
                                  NavBar
        ************************************************************
        ************************************************************
        ************************************************************
        --}}

                @include('components.nav.nav')
                {{--
        ************************************************************
        ************************************************************
        ************************************************************
                                 Catagory
        ************************************************************
        ************************************************************
        ************************************************************
        --}}


                @include('components.catagory.catagory')


            </header>
            {{--
    ************************************************************
    ************************************************************
    ************************************************************
                            Featured Products
    ************************************************************
    ************************************************************
    ************************************************************
    --}}

            @include('components.featured-products.featured-products')

        </div>
        <main class="main-wrapper">
            {{--
    ************************************************************
    ************************************************************
    ************************************************************
                            Service Area
    ************************************************************
    ************************************************************
    ************************************************************
    --}}


            @include('components.statics.service-area')

            {{--
    ************************************************************
    ************************************************************
    ************************************************************
                            New Arival
    ************************************************************
    ************************************************************
    ************************************************************
    --}}

            @include('components.new-arrival.new-arrival')

            {{--
    ************************************************************
    ************************************************************
    ************************************************************
                            Best Seller
    ************************************************************
    ************************************************************
    ************************************************************
    --}}

            @include('components.best-seller.best-seller')
            {{--
    ************************************************************
    ************************************************************
    ************************************************************
                            Dont Miss Offer
    ************************************************************
    ************************************************************
    ************************************************************
    --}}

            @include('components.statics.dont-miss-offer')

            {{--
    ************************************************************
    ************************************************************
    ************************************************************
                            Explore our product
    ************************************************************
    ************************************************************
    ************************************************************
    --}}

            @include('components.explore-product.explore-product')

            {{--
    ************************************************************
    ************************************************************
    ************************************************************
                            Newsletter
    ************************************************************
    ************************************************************
    ************************************************************
    --}}
            @include('components.statics.newsletter')

            {{--
    ************************************************************
    ************************************************************
    ************************************************************
                            Service Area
    ************************************************************
    ************************************************************
    ************************************************************
    --}}


            @include('components.statics.service-area')

        </main>

        {{--
    ************************************************************
    ************************************************************
    ************************************************************
                            Footer
    ************************************************************
    ************************************************************
    ************************************************************
    --}}


        @include('components.statics.footer')
    @endsection
