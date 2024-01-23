@extends('layouts.app')

@section('content')
    @include('components.nav.nav')

    <main class="main-wrapper">
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="inner">
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">My Account</li>
                            </ul>
                            <h1 class="title">Hello {{ $user->name }}</h1>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->

        <!-- Start My Account Area  -->
        <div class="axil-dashboard-area axil-section-gap">
            <div class="container">
                <div class="axil-dashboard-warp">

                    <div class="row">
                        <div class="col-xl-3 col-md-4">
                            <aside class="axil-dashboard-aside">
                                <nav class="axil-dashboard-nav">
                                    <div class="nav nav-tabs" role="tablist">
                                        <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-dashboard"
                                            role="tab" aria-selected="true"><i class="fas fa-th-large"></i>
                                            Account Details</a>

                                        <a class="nav-item nav-link " data-bs-toggle="tab" href="#nav-orders" role="tab"
                                            aria-selected="false"><i class="fas fa-shopping-basket"></i>Orders</a>


                                        <a class="nav-item nav-link" href="sign-in.html"><i
                                                class="fal fa-sign-out"></i>Logout</a>

                                    </div>
                                </nav>
                            </aside>
                        </div>
                        <div class="col-xl-9 col-md-8">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel">
                                    @if (!$user->userProfile)
                                        <div class="col-lg-9">
                                            <div class="axil-dashboard-account">
                                                <form class="account-details-form"
                                                    action="{{ route('profile.userinfo', ['id' => $user->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder='John' name="first_name">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder='Wick' name="last_name">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Phone Number</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder='+1*********' name="phone_number">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>House Number / Street Address</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder='House # 17 St.14, Bakers Street'
                                                                    name="street_address">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>City</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder='Berlin' name="city">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Country</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder='Germany' name="country">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="axil-btn"
                                                        style="background-color: #3577f0">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    @else
                                        <div class="axil-dashboard-address">

                                            <div class="row row--30">
                                                <div class="col-lg-6">
                                                    <div class="address-info mb--40">
                                                        <div
                                                            class="addrss-header d-flex align-items-center justify-content-between">
                                                            <h4 class="title mb-0">Contact Details</h4>
                                                            {{-- <a href="#" class="address-edit"><i
                                                                    class="far fa-edit"></i></a> --}}
                                                        </div>
                                                        <ul class="address-details">
                                                            <li>Name: {{ $user->userProfile->first_name }}
                                                                {{ $user->userProfile->last_name }}</li>
                                                            <li>Email: {{ $user->email }}</li>
                                                            <li>Phone: {{ $user->userProfile->phone_number }}</li>
                                                            <li>Address : {{ $user->userProfile->street_address }}</li>
                                                            <li>City : {{ $user->userProfile->city }}</li>
                                                            <li>Country : {{ $user->userProfile->country }}</li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endif


                                </div>
                                <div class="tab-pane fade" id="nav-orders" role="tabpanel">
                                    <div class="axil-dashboard-order">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Order</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Total</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- {{ dd($orders) }} --}}
                                                    @foreach ($orders as $order)
                                                        <tr>
                                                            <th scope="row">#{{ $order->id }}</th>
                                                            <td>{{ $order->created_at->format('d F Y') }}</td>
                                                            <td>{{ $order->status }}</td>
                                                            <td>${{ $order->total }}</td>
                                                            <td><a href="{{ route('print', ['orderId' => $order->id]) }}"
                                                                    class="axil-btn view-btn">Print
                                                                    Invoice</a></td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End My Account Area  -->

    </main>
@endsection
