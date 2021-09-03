@extends('backend.layouts.app')

@section('content')

<x-content-wrapper-header :page="$page"></x-content-wrapper-header>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    This page has been enhanced for printing. Click the print button
                    at the bottom of the invoice to
                    test.
                </div>
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i>{{ Auth::guard('admin')->user()->name }}
                                <small class="float-right">Date: {{ date_format($order->created_at, 'd/m/Y') }}</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>{{ Auth::guard('admin')->user()->name }}</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (+84) 039-328-6094<br>
                                Email: {{ Auth::guard('admin')->user()->email }}
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong>{{ $order->user->name }}</strong><br>
                                Address: {{ $order->address }}<br>
                                Phone: {{ $order->phone }}<br>
                                Email: {{ $order->user->email }}
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #007612</b><br>
                            <br>
                            <b>Order ID:</b> {{ $order->id }}<br>
                            <b>Payment Due:</b> {{ $order->created_at }}<br>
                            <b>Account:</b> {{ $order->user->id }}
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Product</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Category</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderDetails as $item)
                                    <tr>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->color->name }}</td>
                                        <td>{{ $item->size->name }}</td>
                                        <td>{{ $item->product->category->name }}</td>
                                        <td>${{ number_format($item->price * $item->quantity, 2, ',') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                            <p class="lead">Payment Methods:</p>
                            <img src="{{ asset('asset-backend') }}/dist/img/credit/visa.png" alt="Visa">
                            <img src="{{ asset('asset-backend') }}/dist/img/credit/mastercard.png" alt="Mastercard">
                            <img src="{{ asset('asset-backend') }}/dist/img/credit/american-express.png"
                                alt="American Express">
                            <img src="{{ asset('asset-backend') }}/dist/img/credit/paypal2.png" alt="Paypal">

                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>${{ moneyFormat($order->total_amount) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tax</th>
                                        <td>$0</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping:</th>
                                        <td>$0</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>${{ moneyFormat($order->total_amount) }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                                    class="fas fa-print"></i> Print</a>
                            <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i>
                                Submit
                                Payment
                            </button>
                            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Generate PDF
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@endsection
