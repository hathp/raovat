@extends('admin.layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                @include('admin.user.partials.portlet-button-title')
                <div class="portlet-body">
                    @include('admin.partials.portlet-toolbar')
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable"  data-delete-link="{{ route('admin.cart.order.destroy') }}" data-toggle-link="{{ route('admin.cart.order.toggle') }}">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                                <th>Họ tên</th>
                                <th>SĐT</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Thanh toán</th>
                                <th>Thời gian</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($order as $order )
                            <tr class="odd gradeX">
                                <td><input type="checkbox" name="id[]" class="checkboxes" value="{{ $order->id }}" /> </td>
                                <td><a href="{{ route('admin.cart.order.show', $order->id) }}">{{ $order->order_name }}</a></td>
                                <td>{{ $order->order_mobile  }}</td>
                                <td>{{ $order->order_email  }}</td>
                                <td>{{ $order->order_address }}</td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="is_pay" ><i class="fa {{ $order->is_pay == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
                                <td>@datetime($order->created_at)</td>
                                <td align="center">
{{--                                    {!! ViewHelper::button('Sửa ', route('admin.cart.order.edit', $order->id), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']) !!}--}}
                                    {!! ViewHelper::button('Xóa ', null, 'link', ['icon' => 'icon-trash', 'class' => 'delete-item', 'size'=>'xs', 'color' => 'red', 'data-toggle' => 'confirmation']) !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection