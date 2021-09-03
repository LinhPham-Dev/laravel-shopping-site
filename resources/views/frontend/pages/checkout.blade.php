@extends('frontend.layouts.app')

@section('content')

<main class="main checkout">
    <div class="page-content pt-7 pb-10 mb-10">
        <div class="step-by pr-4 pl-4">
            <h3 class="title title-simple title-step"><a href="{{ route('cart.show') }}">1. Shopping Cart</a></h3>
            <h3 class="title title-simple title-step active"><a href="{{ route('checkout') }}">2. Checkout</a></h3>
        </div>
        <div class="container mt-7">
            @if (!Auth::check())
            <div class="card accordion">
                <div class="alert alert-light alert-primary alert-icon mb-4 card-header">
                    <i class="fas fa-exclamation-circle"></i>
                    <span class="text-body">Returning customer?</span>
                    <a href="#alert-body1" class="text-primary collapse">Click here to login</a>
                </div>
                <div class="alert-body collapsed" id="alert-body1">
                    <p>If you have shopped with us before, please enter your details below.
                        If you are a new customer, please proceed to the Billing section.</p>
                    <div class="row cols-md-2">
                        <form class="mb-4 mb-md-0">
                            <label for="username">Username Or Email *</label>
                            <input type="text" class="input-text form-control mb-0" name="username" id="username"
                                autocomplete="username">
                        </form>
                        <form class="mb-4 mb-md-0">
                            <label for="password">Password *</label>
                            <input class="input-text form-control mb-0" type="password" name="password" id="password"
                                autocomplete="current-password">
                        </form>
                    </div>
                    <div class="checkbox d-flex align-items-center justify-content-between">
                        <div class="form-checkbox pt-0 mb-0">
                            <input type="checkbox" class="custom-checkbox" id="signin-remember"
                                name="signin-remember" />
                            <label class="form-control-label" for="signin-remember">Remember
                                Me</label>
                        </div>
                        <a href="#" class="lost-link">Lost your password?</a>
                    </div>
                    <div class="link-group">
                        <a href="#" class="btn btn-dark btn-rounded mb-4">Login</a>
                        <span class="d-inline-block text-body font-weight-semi-bold">or Login With</span>
                        <div class="social-links mb-4">
                            <a href="#" class="social-link social-google fab fa-google"></a>
                            <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
                            <a href="#" class="social-link social-twitter fab fa-twitter"></a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="card accordion">
                <div class="alert alert-light alert-primary alert-icon mb-4 card-header">
                    <i class="fas fa-exclamation-circle"></i>
                    <span class="text-body">Have a coupon?</span>
                    <a href="#alert-body2" class="text-primary">Click here to enter your code</a>
                </div>
                <div class="alert-body mb-4 collapsed" id="alert-body2">
                    <p>If you have a coupon code, please apply it below.</p>
                    <div class="check-coupon-box d-flex">
                        <input type="text" name="coupon_code" class="input-text form-control text-grey ls-m mr-4"
                            id="coupon_code" value="" placeholder="Coupon code">
                        <button type="submit" class="btn btn-dark btn-rounded btn-outline">Apply Coupon</button>
                    </div>
                </div>
            </div>
            <form action="{{ route('checkout.handler') }}" method="POST" class="form">
                @csrf
                <div class="row">
                    <div class="col-lg-7 mb-6 mb-lg-0 pr-lg-4">
                        <h3 class="title title-simple text-left text-uppercase">Billing Details</h3>
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Name *</label>
                                <input type="text" class="form-control" name="name" required
                                    value="{{ Auth::user()->name }}" />
                            </div>
                            <div class="col-xs-6">
                                <label>Email *</label>
                                <input type="text" class="form-control" name="email" required
                                    value="{{ Auth::user()->email }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <label>Phone *</label>
                                <input type="text" class="form-control" name="phone" required placeholder="Phone" />
                            </div>
                        </div>
                        <label>Street Address *</label>
                        <input type="text" class="form-control" name="address1"
                            placeholder="House number and street name" required />

                        <h2 class="title title-simple text-uppercase text-left">Additional Information</h2>
                        <label>Order Notes (Optional)</label>
                        <textarea class="form-control pb-2 pt-2 mb-0 text-dark" cols="30" rows="5" name="note"
                            placeholder="Notes about your order, e.g. special notes for delivery">Giao mau lên cái ...
                        </textarea>
                    </div>
                    <aside class="col-lg-5 sticky-sidebar-wrapper">
                        <div class="sticky-sidebar mt-1" data-sticky-options="{'bottom': 50}">
                            <div class="summary pt-5">
                                <h3 class="title title-simple text-left text-uppercase">Your Order</h3>
                                <table class="order-table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart->content() as $item)
                                        <tr>
                                            <td class="product-name">{{ $item['name'] }}<span
                                                    class="product-quantity">×&nbsp;{{ $item['quantity'] }}</span></td>
                                            <td class="product-total text-body">
                                                ${{ number_format($item['price'], 2, ',') }}</td>
                                        </tr>
                                        @endforeach
                                        <tr class="summary-subtotal">
                                            <td>
                                                <h4 class="summary-subtitle">Subtotal</h4>
                                            </td>
                                            <td class="summary-subtotal-price pb-0 pt-0">
                                                ${{ number_format($cart->getTotalAmount(), 2, ',') }}
                                            </td>
                                        </tr>
                                        {{-- Shiping --}}
                                        <tr class="sumnary-shipping shipping-row-last">
                                            <td colspan="2">
                                                <h4 class="summary-subtitle">Calculate Shipping</h4>
                                                <ul>
                                                    @foreach ($shipping_units as $ship)
                                                    <li>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="{{ $ship->value }}"
                                                                name="shipping_unit" class="custom-control-input"
                                                                value="{{ $ship->id }}"
                                                                {{ $ship->id == 1 ? 'checked' : '' }}>
                                                            <label class="custom-control-label"
                                                                for="{{ $ship->value }}">{{ $ship->name }}</label>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td class="pb-0">
                                                <h4 class="summary-subtitle">Total</h4>
                                            </td>
                                            <td class=" pt-0 pb-0">
                                                <p class="summary-total-price ls-s text-primary">
                                                    ${{ number_format($cart->getTotalAmount(), 2, ',') }}</p>
                                            </td>
                                        </tr>
                                        {{-- Payment --}}
                                        <tr class="sumnary-shipping shipping-row-last">
                                            <td colspan="2">
                                                <h4 class="summary-subtitle">Payment Methods</h4>
                                                <ul>
                                                    @foreach ($payment_methods as $pay)
                                                    <li>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="{{ $pay->value }}"
                                                                name="payment_methods" class="custom-control-input"
                                                                value="{{ $pay->id }}"
                                                                {{ $pay->id == 1 ? 'checked' : '' }}>
                                                            <label class="custom-control-label"
                                                                for="{{ $pay->value }}">{{ $pay->name }}</label>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="form-checkbox mt-4 mb-5">
                                    <input type="checkbox" class="custom-checkbox" id="terms-condition"
                                        name="terms-condition" />
                                    <label class="form-control-label" for="terms-condition">
                                        I have read and agree to the website <a href="#">terms and conditions
                                        </a>*
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded btn-order">Place Order</button>
                            </div>
                        </div>
                    </aside>
                </div>
            </form>
        </div>
    </div>
</main>

@endsection
