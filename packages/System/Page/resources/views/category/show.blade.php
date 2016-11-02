@extends('page::layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-3"><p>Tên nhóm: <b>{{ $page_category->name }}</b></p></div>
        <div class="col-xs-3"><p>Slug: <b>{{ $page_category->slug }}</b></p></div>
        <div class="col-xs-3"><p>Trạng thái: <b>{{ $page_category->active }}</b></p></div>
    </div>
@endsection