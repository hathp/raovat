@extends('product::layout.main')
@section('js-page-script')
    @include('product::product.partials.js')
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                @include('product::product.partials.portlet-button-title')
                <div class="portlet-body">
{{--                    @include('product::partials.portlet-toolbar')--}}
                    {!! Form::open(['class' => 'user-list']) !!}
                    {!! Form::hidden('_method', '') !!}
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-delete-link="{{ route('admin.attribute.destroy') }}" data-toggle-link="{{ route('admin.attribute.toggle') }}">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                                <th> Tên </th>

                                <th> Sắp xếp </th>
                                <th> Kích hoạt </th>
                                <th> Hành động </th>
                            </tr>
                        </thead>
                        <tbody id="engine">
                        @foreach($attributes as $attribute )
                            <tr class="odd gradeX">
                                <td ><input type="checkbox" name="id[]" class="checkboxes" value="{{ $attribute->id }}" /> </td>
                                <td class="item-name" style="width:300px"><a href="{{ $attribute->getShowLink()  }}">{{ \Core\Text\Process::extractNumberOfWord($attribute->name, 6) }}</a> </td>

                                <td align="center">
                                    <a href="#" class="x-editable" id="order" data-pk="{{ $attribute->id }}" data-type="text" data-url="{{ route("admin.attribute.updates") }}" data-title="Số thứ tự">{{ $attribute->order }}</a>
                                </td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa {{ $attribute->active == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
                                <td align="center">
                                    {!! ViewHelper::button('Sửa ', $attribute->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']) !!}
{{--                                    {!! ViewHelper::button('Xóa ', null, 'link', ['icon' => 'icon-trash', 'class' => 'delete-item', 'size'=>'xs', 'color' => 'red', 'data-toggle' => 'confirmation']) !!}--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    {!! Form::close() !!}
                    <div>
                    </div>
                </div>
            </div>
@endsection