@extends('layouts.app')

@section('content')
    @include('components.nav.nav')

    <main class="main-wrapper">

        <!-- Start Cart Area  -->
        <div class="axil-product-cart-area axil-section-gap">
            <div class="container">
                <div class="axil-product-cart-wrap">
                    <div class="product-table-heading">
                        <h4 class="title">Your Cart</h4>
                        <a href="#" class="cart-clear">Clear Shoping Cart</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table axil-product-table axil-cart-table mb--40">

                            <thead>
                                <tr>
                                    <th scope="col" class="product-remove"></th>
                                    <th scope="col" class="product-thumbnail">Product</th>
                                    <th scope="col" class="product-title"></th>
                                    <th scope="col" class="product-price">Price</th>
                                    <th scope="col" class="product-quantity">Quantity</th>
                                    <th scope="col" class="product-subtotal">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($items as $key => $item)
                                    {{-- {{ dump($item) }} --}}
                                    <tr data-product-row-id="{{ $item->id }}">
                                        <td class="product-remove">
                                            <form>
                                                <button class="remove-wishlist remove-item-cart-btn" type="submit"
                                                    data-product-id="{{ $item->id }}"> <i class="fal fa-times"></i>
                                                </button>
                                            </form>

                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="single-product.html">
                                                <img src="{{ asset($item->associatedModel->titleImage->path) }}"
                                                    alt="Digital Product">
                                            </a>
                                        </td>
                                        <td class="product-title"><a href="single-product.html">{{ $item->name }}</a></td>
                                        <td class="product-price" data-title="Price"><span class="currency-symbol">$</span>
                                            {{ $item->price }}</td>
                                        <td class="product-quantity" data-title="Qty">
                                            <div class="pro-qty">
                                                <span class="dec qtybtn" data-product-id="{{ $item->id }}">-</span>
                                                <input type="number" class="quantity-input" value="{{ $item->quantity }}">
                                                <span class="inc qtybtn" data-product-id="{{ $item->id }}">+</span>
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Subtotal">
                                            <span class="currency-symbol">$</span>
                                            <span class="subtotal"
                                                data-product-id="{{ $item->id }}">{{ $item->price * $item->quantity }}</span>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 ">
                            <div class="axil-order-summery mt--80">
                                <h5 class="title mb--20">Order Summary</h5>
                                <div class="summery-table-wrap">
                                    <table class="table summery-table mb--30">
                                        <tbody>
                                            <tr class="order-total">
                                                <td>Total</td>
                                                <td class="order-total-amount">{{ $total }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="{{ route('checkout') }}" class="axil-btn btn-bg-primary checkout-btn">Process to
                                    Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Cart Area  -->

    </main>
@endsection
