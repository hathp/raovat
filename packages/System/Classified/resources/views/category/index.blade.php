@extends($package_name. '::layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-4">
            <h4>Thêm mới</h4>
            {!! Form::open(['url' => route('admin.category.classified.store'), 'files']) !!}
            @include($package_name .'::category.partials.form')

            <div class="form-actions">
                <button type="submit" class="btn blue">Thêm</button>
            </div>

            {!! Form::close() !!}
        </div>
        <div class="col-xs-8">
            <div class="portlet light bordered">
                @include('admin.partials.portlet-title')
                <div class="portlet-body">
                    {!! Form::open(['id' => 'page-categories-list']) !!}
                    <input type="hidden" name="_method" value="" />
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-toggle-link="{{ route('admin.category.classified.toggle') }}" data-delete-link="{{ route('admin.category.classified.destroy') }}">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Tên </th>
                            <th> Slug </th>
                            <th> Sắp xếp </th>
                            <th> Kích hoạt </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($classified_categories as $classified_category)
                            <tr class="odd gradeX">
                                <td><input type="checkbox" name="id[]" class="checkboxes" value="{{ $classified_category->id }}" /> </td>
                                <td class="item-name"><a href="{{ route("admin.category.classified.show", $classified_category->id) }}">{{ $classified_category->name  }}</a></td>
                                <td class="item-id"><a href="#">{{ $classified_category->slug }}</a></td>
                                <td align="center">
                                    <a href="#" class="x-editable" id="order" data-pk="{{ $classified_category->id }}" data-type="text" data-url="{{ route("admin.category.classified.update", $classified_category->id) }}" data-title="Số thứ tự">{{ $classified_category->order }}</a>
                                </td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa {{ $classified_category->active == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>

                                <td>
                                    {!! ViewHelper::button('Sửa ', route('admin.category.classified.edit', $classified_category->id), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']) !!}
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
@endsection