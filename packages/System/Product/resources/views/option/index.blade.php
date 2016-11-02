@extends('product::layout.main')
@section('js-page-script')
    @include('product::option.partials.js')
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-4">
            <h4>Thêm mới</h4>
            {!! Form::open(['route' => 'admin.product-option.store', 'files']) !!}
                <div class="form-body" id="option">

                    {{-- Parent Category --}}
                    {!! FormHelper::select('Loại sản phẩm', 'product_category_id', $category_list, null, ['input' => ['id'=>'product_category','required']]) !!}

                    <div id="product_option" class="form-group">

                    </div>

                    {{-- Category name --}}
                    {!! FormHelper::text('Tên thuộc tính', 'name', null, ['input' => ['required']]) !!}

                    {{-- language --}}
                    {!! FormHelper::select('Ngôn ngữ', 'language_id', $lang_list, null, ['input' => ['required']]) !!}


                    {{-- Active --}}
                    <div class="row">
                        <div class="col-xs-8">
                            {!! FormHelper::text('Sắp xếp', 'order',null,['input' => ['class'=>'mask-numeric']]) !!}
                        </div>
                        <div class="col-xs-4" style="margin-top: 30px;">
                            {!! FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0,'checked'=>'checked']]) !!}
                        </div>
                    </div>
                    <hr />
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn blue">Thêm</button>
                </div>
            {!! Form::close() !!}
        </div>
        <div class="col-xs-8">
            <div class="portlet light bordered">
{{--                {!! FormHelper::select(null, 'category_id', $category_list, null, ['input' => ['style'=>'width:200px;float:right']]) !!}--}}
                @include('admin.partials.portlet-title')

                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-toggle-link="{{ route('admin.product.option.toggle') }}" data-delete-link="{{ route('admin.product.option.destroy') }}">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Tên </th>
                            <th> Danh mục </th>
                            <th> Sắp xếp </th>
                            <th> Kích hoạt </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($product_options as $product_option)
                                <tr class="odd gradeX">
                                    <td><input type="checkbox" class="checkboxes" value="{{ $product_option->id }}" /> </td>
                                    <td><a href="{{ route('admin.product.category.show', $product_option->id) }}">{{ $product_option->name  }}</a></td>
                                    <td align="center"> {{ $product_option->product_category->name }}</td>
                                    <td align="center">
                                        <a href="#" class="x-editable" id="order" data-pk="{{ $product_option->id }}" data-type="text" data-url="{{ route("admin.product.option.updates") }}" data-title="Số thứ tự">{{ $product_option->order }}</a>
                                    </td>
                                    <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa {{ $product_option->active == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
                                    <td align="center">
                                        {!! ViewHelper::button('Sửa ', $product_option->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs','class' => 'colorbox']) !!}
                                        {!! ViewHelper::button('Xóa ', null, 'link', ['icon' => 'icon-trash', 'class' => 'delete-item', 'size'=>'xs', 'color' => 'red', 'data-toggle' => 'confirmation']) !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection