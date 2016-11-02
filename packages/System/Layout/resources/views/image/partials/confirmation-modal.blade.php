@extends('product::partials.confirmation-modal')

@section('modal-content')
    <div>

    </div>
    {!! FormHelper::checkbox('Xóa sản phẩm có trong mục này', 'delete_product', 1, false, ['input' => ['form' => 'page-categories-list']]) !!}
@endsection