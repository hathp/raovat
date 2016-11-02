@extends('front::layout.main')

@section('style')
    <link rel="stylesheet" href="/assets/front/plugins/bootstrap-fileinput/css/fileinput.min.css">
    <style>
        table tr td {
            padding: 5px;
        }
    </style>
@endsection

@section('content')
    <!--  -->
    <div class="container-fluid" id="tit-leftbar">
        <div class="container">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <h2>lựa chọn chuyên mục</h2>
            </div>
        </div>
    </div>

    <!--  -->
    <div class="container-fluid" id="leftbar-slideshow">
        <div class="container">
            <!-- /navbar -->
            <form method="post" action="{{ route('front.cart.payment') }}">
                {!! csrf_field() !!}
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <h4>Thông tin người đặt hàng</h4>
                    <div>
                        <table>
                            <tr>
                                <td>Họ tên: <span style="color: red">*</span></td>
                                <td><input type="text" name="order_name" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ: <span style="color: red">*</span> </td>
                                <td><input type="text" name="order_address" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="text" name="order_email" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td>Điện thoại: <span style="color: red">*</span></td>
                                <td><input type="text" name="order_mobile" class="form-control" required /></td>
                            </tr>
                        </table>
                    </div>

                    <h4>Thông tin người nhận hàng</h4>
                    <div><label style="font-weight: normal"><input id="same-as-order" type="checkbox" name="same_as_order" /> Như người đặt hàng</label></div>
                    <div id="receiver-info">
                        <table>
                            <tr>
                                <td>Họ tên:</td>
                                <td><input type="text" name="receiver_name" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ:</td>
                                <td><input type="text" name="receiver_address" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td>Điện thoại:</td>
                                <td><input type="text" name="receiver_mobile" class="form-control" `/></td>
                            </tr>
                        </table>
                    </div>

                    <button style="margin-top: 15px" type="submit" class="btn btn-primary">Gửi đơn hàng</button>
                </div>

            </form>

            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <h3>Giỏ hàng</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã tin</th>
                        <th>Tiêu đề</th>
                        <th>Số lượng</th>
                        <th>Giá tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0; $i < count($carts); $i++)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $carts[$i]->code }}</td>
                            <td><a href="{{ route('front.classified.show', $carts[$i]->slug) }}">{{ $carts[$i]->name }}</a> </td>
                            <td>{{ $quantity[$carts[$i]->id] }}</td>
                            <td>{{ number_format($carts[$i]->getPrice($quantity[$carts[$i]->id])) }}</td>
                        </tr>
                    @endfor
                    <tr>
                        <td colspan="6"><p style="font-size: 1.2em; text-align: right; padding-right: 215px">Tổng tiền: <span style="font-weight: bold; color: red">{{ number_format($total_price) }}</span></p></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#same-as-order').on('change', function() {
                if(this.checked) {
                    $('#receiver-info').slideUp(300);
                }
                else {
                    $('#receiver-info').slideDown(300);
                }
            });
        });
    </script>
@endsection
