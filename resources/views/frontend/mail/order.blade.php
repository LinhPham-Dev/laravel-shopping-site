<!doctype html>
<html lang="en">

<head>
    <title>Send Mail</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    @includeIf('frontend.layouts.css')
</head>

<body>
    <div class="container mt-8">
        <div class="order-message mr-auto ml-auto">
            <div class="icon-box d-inline-flex align-items-center">
                <div class="icon-box-content text-left">
                    <h5 class="icon-box-title font-weight-bold lh-1 mb-1">Thank You!</h5>
                    <p class="lh-1 ls-m">Your order has been received</p>
                </div>
            </div>
        </div>
        <div class="order-results text-center">
            <div class="overview-item">
                <span>Number:</span>
                <strong>{{ $order->id }}</strong>
            </div>
            <div class="overview-item">
                <span>Status:</span>
                <strong>{{ orderStatus($order->status) }}</strong>
            </div>
            <div class="overview-item">
                <span>Date:</span>
                <strong>{{ date_format($order->created_at, 'g:i F Y') }}</strong>
            </div>
            <div class="overview-item">
                <span>Email:</span>
                <strong>{{ $order->user->email }}</strong>
            </div>
            <div class="overview-item">
                <span>Total:</span>
                <strong>${{ $order->total_amount }}</strong>
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
                    @foreach ($order->orderDetails as $item)
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
                        <td class="summary-subtotal-price">${{ number_format($order->total_amount, 2, ',') }}
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
                            <p class="summary-total-price">${{ number_format($order->total_amount, 2, ',') }}
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h2 class="title title-simple text-left pt-10 mb-2">Billing Address</h2>
        <div class="address-info pb-8 mb-6">
            <p class="address-detail pb-2">
                <span>Name: {{ $order->user->name }}</span><br>
                <span>Address: {{ $order->address }}</span><br>
                <span>Phone: {{ $order->phone }}</span><br>
                <span>Email: {{ $order->user->email }}</span><br>
            </p>
        </div>

        <a href="{{ route('order.confirm', $order->token ) }}">Confirm my order !</a>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
