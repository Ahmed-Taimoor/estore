@extends('layouts.app')

@section('content')
    @include('components.nav.nav')

    <main class="main-wrapper">

        <!-- Start Checkout Area  -->
        <div class="axil-checkout-area axil-section-gap">
            <div class="container">

                <div class="row">

                    <div class="col">
                        <div class="axil-order-summery order-checkout-summery">
                            <h5 class="title mb--20">Your Order</h5>
                            <div class="summery-table-wrap">
                                <table class="table summery-table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            {{-- {{ dd($item) }} --}}
                                            <tr class="order-product">
                                                <td> {{ $item['name'] }} <span class="quantity">x{{ $item['quantity'] }}
                                                    </span>
                                                </td>
                                                <td>$ {{ $item['subTotal'] }}</td>
                                            </tr>
                                        @endforeach
                                        <tr class="order-total">
                                            <td>Total</td>
                                            <td class="order-total-amount">${{ $total }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <form action="{{ route('placeorder') }}" method="POST">
                                @csrf
                                <button type="submit" class="axil-btn btn-bg-primary checkout-btn">Place
                                    Order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Checkout Area  -->

    </main>
@endsection
