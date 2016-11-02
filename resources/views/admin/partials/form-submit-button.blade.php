@if($action_method_name == 'show')
    <a href="{{ route($prefix_route_name . 'edit') }}" type="button" class="btn default">Chỉnh sửa</a>
@else
    <button type="submit" class="btn blue">OK</button>
@endif

<a href="{{ route($prefix_route_name . 'index') }}" type="button" class="btn default">Hủy bỏ</a>