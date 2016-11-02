@extends('front::layout.main')

@section('style')
    <link rel="stylesheet" href="/assets/front/plugins/bootstrap-fileinput/css/fileinput.min.css">
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
            @include('front::partials.category')

            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <h3>Tin rao vặt của bạn</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>STT</td>
                        <th>Mã tin</th>
                        <th>Tiêu đề</th>
                        <th>Thời gian</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0; $i < count($classifieds); $i++)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $classifieds[$i]->code }}</td>
                            <td><a href="{{ route('front.classified.show', $classifieds[$i]->slug) }}">{{ $classifieds[$i]->name }}</a> </td>
                            <td>@datetime($classifieds[$i]->created_at)</td>
                            <td>
                                <a href="{{ route('front.user.classified.edit', $classifieds[$i]->slug) }}" class="btn btn-primary btn-xs" >Sửa</a>
                                <a href="javascript:;" class="btn btn-danger btn-xs delete" data-toggle="confirmation" data-title="Bạn có muốn xóa ?" data-url="{{ route('front.user.classified.destroy', $classifieds[$i]->id) }}">Xóa</a>
                            </td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
