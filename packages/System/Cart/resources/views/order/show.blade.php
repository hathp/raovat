@extends('admin.layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-6">
            <div class="portlet box green-meadow">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-gift"></i>Người mua hàng {{ empty($order->receiver_name) ? 'và mua hàng' : '' }}</div>
                </div>
                <div class="portlet-body">
                    <p>Họ tên: {{ $order->order_name }}</p>
                    <p>Địa chỉ: {{ $order->order_address }}</p>
                    <p>SĐT: {{ $order->order_mobile }}</p>
                    <p>Email: {{ $order->order_email }}</p>
                </div>
            </div>
        </div>
        @unless(empty($order->receiver_name))
        <div class="col-xs-6">
            <div class="portlet box green-meadow">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-gift"></i>Người nhận hàng </div>
                </div>
                <div class="portlet-body">
                    <p>Họ tên: {{ $order->receiver_name }}</p>
                    <p>Địa chỉ: {{ $order->receiver_address }}</p>
                    <p>SĐT: {{ $order->receiver_mobile }}</p>
                </div>
            </div>
        </div>
        @endunless
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet box green-meadow">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-gift"></i>Thông tin đơn hàng </div>
                </div>
                <div class="portlet-body">
                    <div>
                        <p>Thanh toán: {{ $order->is_pay == 1 ? 'Đã thanh toán' : 'Chưa thanh toán' }}</p>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Giá</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order_details as $order_detail)
                            <tr>
                                <td>{{ $order_detail->classifieds->name }}</td>
                                <td>{{ $order_detail->quantity }}</td>
                                <td>{{ number_format($order_detail->price) }}</td>
                                <td>{{ number_format($order_detail->quantity * $order_detail->price) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3"></td>
                            <td><p style="font-weight: bold;">Tổng tiền: <span style="color: red">{{ number_format($order->totalPrice()) }}</span></p></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection