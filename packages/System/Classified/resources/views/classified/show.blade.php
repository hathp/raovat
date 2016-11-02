@extends($package_name. '::layout.main')

@section('page-style')
    <style>
        p {
            margin: 0 !important;
            padding: 0 !important;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-3">
            <p>SĐT: <b>{{ $classifieds->mobile }}</b></p>
        </div>
        <div class="col-xs-3">
            <p>Email: <b>{{ $classifieds->email }}</b></p>
        </div>
        <div class="col-xs-6">
            <p>Đại chỉ: <b>{{ $classifieds->address }}</b></p>
        </div>
        <div class="col-xs-3">
            <p>Mã tin: <b>{{ $classifieds->code }}</b></p>
        </div>
        <div class="col-xs-3">
            <p>Thời gian: <b>@datetime($classifieds->created_at)</b></p>
        </div>
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-3">
                    <img style="width: 100%;" src="{{ $classifieds->getImage() }}" alt="">
                </div>
            </div>
        </div>


        <div class="col-xs-12">
            <h4>Nội dung</h4>
            {!! $classifieds->content  !!}
        </div>
    </div>
@endsection