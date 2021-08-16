@extends('frontend.layouts.app')

@section('content')

<main class="main order">
    <div class="page-content pt-7 pb-10 mb-10">
        <div class="step-by pr-4 pl-4">
            <h3 class="title title-simple title-step"><a href="">Order History</a></h3>
        </div>
        <div class="container mt-8 order-details text-center">
            <div class="row">
                <div class="col-lg-1">
                    <div class="overview-item">
                        <span>Number:</span>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="overview-item">
                        <span>Status:</span>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="overview-item">
                        <span>Date:</span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="overview-item">
                        <span>Email:</span>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="overview-item">
                        <span>Total Amout:</span>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="overview-item">
                        <span>Payment method:</span>
                    </div>
                </div>
            </div>
            <hr>
            {{-- Show list order --}}
            @foreach ($orders as $order)
            <div class="row">
                <div class="col-lg-1">
                    <div>
                        <span>{{ $order->id }}</span>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div>
                        <span>{{ orderStatus($order->status) }}</span>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div>
                        <span>{{ date_format($order->created_at, 'G:i F Y') }}</span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div>
                        <span>{{ $order->user->email }}</span>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div>
                        <span>${{ number_format($order->total_amount, 2, ',') }}</span>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div>
                        <span>{{ $order->payment_methods }}</span>
                    </div>
                </div>
            </div>
            <hr>
            @endforeach

            {{-- Paginate --}}
            {{ $orders->links() }}
        </div>
    </div>
</main>

@endsection
