@extends('layout::layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
{{--                @include('layout::layout.partials.portlet-button-title')--}}
                <div class="portlet-body">
                    @if($image_album_slug == 'slide')
                        @include('layout::partials.portlet-toolbar')
                    @endif
                    {!! Form::open(['class' => 'contact-list']) !!}
                    {!! Form::hidden('_method', '') !!}
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-delete-link="{{ $ajax_delete_link  }}" data-toggle-link="{{ $ajax_toggle_link  }}" >
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Image </th>
							<th> Tiêu đề </th>
							<th> Sắp Xếp </th>
                            <th> Hiển thị </th>
                            <th> Ngày tạo </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($images as $image )
                            <tr class="odd gradeX">
                                <td><input type="checkbox" name="id[]" class="checkboxes" value="{{ $image->id }}" /> </td>
                                <td class="item-name">
                                    <img class="img-responsive" src="{{ $image->getLink(config('layout-image.image_layout.thumbnail.path')) }}" alt="" style="height: 80px;">
                                </td>
                                <td align="center">{{ $image->name }}</td>
                                <td align="center">
                                    <a href="#" class="x-editable" id="order" data-pk="{{ $image->id }}" data-type="text" data-url="{{ route("admin.layout.updates") }}" data-title="Số thứ tự">{{ $image->order }}</a>
                                </td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa {{ $image->active == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
                                <td align="center">{{ $image->created_at }}</td>
                                <td align="center">
                                    @if($image_album_slug == 'slide')
                                        {!! ViewHelper::button('Xóa ', null, 'link', ['icon' => 'icon-trash', 'class' => 'delete-item', 'size'=>'xs', 'color' => 'red', 'data-toggle' => 'confirmation']) !!}
                                    @endif
                                    {!! ViewHelper::button('Sửa ', route("admin.$image_album_slug.edit", $image->id), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']) !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection