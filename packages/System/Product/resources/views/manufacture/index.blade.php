@extends('product::layout.main')
@section('js-page-script')
{{--    @include('product::category.partials.js')--}}
@endsection
@section('content')
    <div class="row">

        <div class="col-xs-12">
            <div class="portlet light bordered">
                @include('product::manufacture.partials.portlet-button-title')
                <div class="portlet-body">
                    @include('product::partials.portlet-toolbar')
                    {!! Form::open(['id' => 'product-categories-list']) !!}
                    <input type="hidden" name="_method" value="" />
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-toggle-link="{{ route('admin.manufacture.toggle') }}" data-delete-link="{{ route('admin.manufacture.destroy') }}" data-find-link="{{ route('admin.product.category.find') }}" >
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Tên hãng sản xuất</th>
                            <th> Sắp xếp </th>
                            <th> Kích hoạt </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody id="engine">
                            @foreach($manufactures as $manufacture)
                                <tr class="odd gradeX">
                                    <td><input type="checkbox" name="id[]" class="checkboxes" value="{{ $manufacture->id }}" /> </td>
                                    <td class="item-name"><a href="{{ route('admin.product-manufacture.show', $manufacture->id) }}">{{ $manufacture->name  }}</a></td>
                                    <td align="center">
                                        <a href="#" class="x-editable" id="order" data-pk="{{ $manufacture->id }}" data-type="text" data-url="{{ route("admin.manufacture.updates") }}" data-title="Số thứ tự">{{ $manufacture->order }}</a>
                                    </td>
                                    <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa {{ $manufacture->active == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
                                    <td align="center">
                                        {!! ViewHelper::button('Sửa ', $manufacture->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']) !!}
                                        {!! ViewHelper::button('Xóa ', null, 'link', ['icon' => 'icon-trash', 'class' => 'delete-item', 'size'=>'xs', 'color' => 'red', 'data-toggle' => 'confirmation']) !!}
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
    @include('product::category.partials.confirmation-modal')
@endsection
