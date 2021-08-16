@extends('backend.layouts.app')

@section('content')

<x-content-wrapper-header :page="$page"></x-content-wrapper-header>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title line-height-40">DataTable Orders</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                {{-- Success --}}
                                <div class="show-success d-none">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong class="message-success">Update status order number $id success
                                            !</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                                {{-- Error --}}
                                <div class="show-error d-none">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong class="message-error">Update status order error !</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                                {{-- List Order --}}
                                <table class="table table-bordered table-hover table-info text-center">
                                    <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Total Amout</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($orders) == 0)
                                        <div class=" alert alert-warning alert-dismissible fade show" role="alert">
                                            <span>No any orders here !</span>
                                        </div>
                                        @else
                                        @foreach ($orders as $order)
                                        <tr>
                                            <th>{{ $order->id }}</th>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->user->email }}</td>
                                            <td>{{ date_format($order->created_at, 'G:i F Y') }}</td>
                                            <td>${{ number_format($order->total_amount, 2, ',') }}</td>
                                            {{-- <td><span class="badge {{ orderStatusClass($order->status) }}">
                                            {{ orderStatus($order->status) }}
                                            </span>
                                            </td> --}}
                                            <td>
                                                <select onchange="onChangeStatus({{ $order->id }})"
                                                    data-order="{{ $order->id }}" id="order-{{ $order->id }}"
                                                    name="status" class="{{ orderStatusClassAdmin($order->status) }}">
                                                    <option class="bg-danger" value="0"
                                                        {{ 0 < $order->status ? 'disabled' : '' }}
                                                        {{ $order->status == 0 ? 'selected' : '' }}>
                                                        Unconfirmed
                                                    </option>
                                                    <option class="bg-secondary" value="1"
                                                        {{ 1 < $order->status ? 'disabled' : '' }}
                                                        {{ $order->status == 1 ? 'selected' : '' }}>
                                                        Processing
                                                    </option>
                                                    <option class="bg-info" value="2"
                                                        {{ 2 < $order->status ? 'disabled' : '' }}
                                                        {{ $order->status == 2 ? 'selected' : '' }}>
                                                        Delivering
                                                    </option>
                                                    <option class="bg-success" value="3"
                                                        {{ $order->status == 3 ? 'selected' : '' }}>
                                                        Delivered
                                                    </option>
                                                </select>
                                            </td>
                                            <td><a href="{{ route('backend.order.detail', $order->id) }}"
                                                    class="btn btn-success">View</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info my-2">
                                    <p>Showing {{ $orders->firstItem() }} to {{ $orders->lastItem() }} of
                                        {{$orders->total()}} entries</p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="float-right">
                                    {{ $orders->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>

    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

@section('script-option')
<script>
    function onChangeStatus(order_id) {

        let value = $(`#order-${order_id}`).val();

        let url = `/admin/orders/update/${order_id}`;

        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: "PUT",
            url: url,
            data: {status: value, _token: _token},
            success: function (response) {
                $('.show-success').removeClass('d-none');
                $('.message-success').html(response.message);
                $(`#order-${response.order_id}`).attr('class', response.status);
            },
            error: function(response) {
                $('.show-error').removeClass('d-none');
            }
        });

    }
</script>
@endsection
