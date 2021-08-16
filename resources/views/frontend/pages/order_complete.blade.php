@extends('frontend.layouts.app')

@section('content')

<main class="main order">
    <div class="page-content pt-7 pb-10 mb-10">
        <div class="step-by pr-4 pl-4">
            <h3 class="title title-simple title-step"><a href="">1. Shopping Cart</a></h3>
            <h3 class="title title-simple title-step"><a href="">2. Checkout</a></h3>
            <h3 class="title title-simple title-step active"><a href="">3. Order Complete</a></h3>
        </div>
        <div class="container mt-8">
            <div class="order-message mr-auto ml-auto">
                <div class="icon-box d-inline-flex align-items-center">
                    <div class="icon-box-icon mb-0">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50"
                            enable-background="new 0 0 50 50" xml:space="preserve">
                            <g>
                                <path fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="bevel"
                                    stroke-miterlimit="10" d="
        											M33.3,3.9c-2.7-1.1-5.6-1.8-8.7-1.8c-12.3,0-22.4,10-22.4,22.4c0,12.3,10,22.4,22.4,22.4c12.3,0,22.4-10,22.4-22.4
        											c0-0.7,0-1.4-0.1-2.1"></path>
                                <polyline fill="none" stroke-width="4" stroke-linecap="round" stroke-linejoin="bevel"
                                    stroke-miterlimit="10" points="
        											48,6.9 24.4,29.8 17.2,22.3 	"></polyline>
                            </g>
                        </svg>
                    </div>
                    <div class="icon-box-content text-left">
                        <h5 class="icon-box-title font-weight-bold lh-1 mb-1">Thank You!</h5>
                        <p class="lh-1 ls-m">Your order has been received</p>
                    </div>
                </div>
            </div>
            <div class="order-results text-center">
                <div class="overview-item">
                    <span>Number:</span>
                    <strong>{{ $new_order->id }}</strong>
                </div>
                <div class="overview-item">
                    <span>Status:</span>
                    <strong>{{ orderStatus($new_order->status) }}</strong>
                </div>
                <div class="overview-item">
                    <span>Date:</span>
                    <strong>{{ date_format($new_order->created_at, 'g:i F Y') }}</strong>
                </div>
                <div class="overview-item">
                    <span>Email:</span>
                    <strong>{{ $new_order->user->email }}</strong>
                </div>
                <div class="overview-item">
                    <span>Total:</span>
                    <strong>${{ $new_order->total_amount }}</strong>
                </div>
                <div class="overview-item">
                    <span>Payment method:</span>
                    <strong>Cash on delivery</strong>
                </div>
            </div>

            <h2 class="title title-simple text-left pt-4 font-weight-bold text-uppercase">Order Details</h2>
            <div class="order-details">
                <table class="order-details-table">
                    <thead>
                        <tr class="summary-subtotal">
                            <td>
                                <h3 class="summary-subtitle">Product</h3>
                            </td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($new_order->orderDetails as $item)
                        <tr>
                            <td class="product-name">{{ $item->product->name }}
                                <span>
                                    -
                                    {{ $item->color->name }}
                                    -
                                    {{ $item->size->name }}
                                    x
                                    {{ $item->quantity }}
                                </span>
                            </td>
                            <td class="product-price">${{ number_format($item->price, 2, ',') }}</td>
                        </tr>
                        @endforeach
                        <tr class="summary-subtotal">
                            <td>
                                <h4 class="summary-subtitle">Subtotal:</h4>
                            </td>
                            <td class="summary-subtotal-price">${{ number_format($new_order->total_amount, 2, ',') }}
                            </td>
                        </tr>
                        <tr class="summary-subtotal">
                            <td>
                                <h4 class="summary-subtitle">Shipping:</h4>
                            </td>
                            <td class="summary-subtotal-price">Free shipping</td>
                        </tr>
                        <tr class="summary-subtotal">
                            <td>
                                <h4 class="summary-subtitle">Payment method:</h4>
                            </td>
                            <td class="summary-subtotal-price">Cash on delivery</td>
                        </tr>
                        <tr class="summary-subtotal">
                            <td>
                                <h4 class="summary-subtitle">Total:</h4>
                            </td>
                            <td>
                                <p class="summary-total-price">${{ number_format($new_order->total_amount, 2, ',') }}
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h2 class="title title-simple text-left pt-10 mb-2">Billing Address</h2>
            <div class="address-info pb-8 mb-6">
                <p class="address-detail pb-2">
                    <span class="order-info">Name: </span>{{ $new_order->user->name }}<br>
                    <span class="order-info">Address: </span>{{ $new_order->address }}<br>
                    <span class="order-info">Phone: </span>{{ $new_order->phone }}<br>
                    <span class="order-info">Email: </span>{{ $new_order->user->email }}<br>
                </p>
            </div>

            <a href="{{ route('category') }}" class="btn btn-icon-left btn-dark btn-back btn-rounded btn-md mb-4"><i
                    class="d-icon-arrow-left"></i>Click here to confirm your order</a>
        </div>
    </div>
</main>

@endsection
