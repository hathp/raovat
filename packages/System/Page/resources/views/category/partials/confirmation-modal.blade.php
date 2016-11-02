@extends('page::partials.confirmation-modal')

@section('modal-content')
    <div>

    </div>
    {!! FormHelper::checkbox('Xóa bài viết có trong mục này', 'delete_page', 1, false, ['input' => ['form' => 'page-categories-list']]) !!}
@endsection