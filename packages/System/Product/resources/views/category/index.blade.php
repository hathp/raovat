@extends('product::layout.main')
@section('js-page-script')
    @include('product::category.partials.js')
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-4">
            <div class="portlet light bordered">
                @include('product::category.partials.portlet-tab-title')
                <div class="portlet-body">
                    {!! Form::open(['route' => 'admin.product.category.store', 'files']) !!}
                    <div class="tab-content">

                        <div class="tab-pane active" id="content">
                            <div>
                                <div class="row">
                                    {{-- Category name --}}
                                    {!! FormHelper::text('Tên', 'name', null, ['input' => ['required', 'class' => 'to-slug', 'data-target' => '.slug']]) !!}

                                    {{-- Slug --}}
                                    {!! FormHelper::text('Slug', 'slug', null, ['input' => ['required', 'class' => 'slug', ]]) !!}

                                    {{-- Parent Category --}}
                                    {!! FormHelper::select('Nhóm cha', 'parent_id', $category_list, null, ['input' => []]) !!}
                                    {{-- language --}}
                                    {!! FormHelper::select('Ngôn ngữ', 'language_id', $lang_list, null, ['input' => ['required']]) !!}
                                    {{-- hình ảnh --}}
                                    <div class="form-group">
                                        <label>Ảnh</label>
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                    <span class="fileinput-filename"> </span>
                                                </div>
                                                <span class="input-group-addon btn default btn-file">
                                                    <span class="fileinput-new"> Chọn file </span>
                                                    <span class="fileinput-exists"> Đổi  file </span>
                                                    <input type="file" name="cover_image"> </span>

                                            </div>
                                        </div>
                                    </div>

                                    {{-- description --}}
                                    {!! FormHelper::textarea('Mô tả', 'description','',['input' => ['style'=>'height:55px', 'data-id' => 1, 'data-width' => '200px']]) !!}
                                    {{-- Active --}}
                                    <div class="row">
                                        <div class="col-xs-8">
                                            {!! FormHelper::text('Sắp xếp', 'order') !!}
                                        </div>
                                        <div class="col-xs-4" style="margin-top: 30px;">
                                            {!! FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0, 'checked'=>'checked']]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="meta">
                            <div>
                                <div class="row">
                                {{-- Meda title tag --}}
                                {!! FormHelper::text('Thẻ tiêu đề', 'meta_title') !!}

                                {{-- Meta keyword --}}
                                {!! FormHelper::text('Thẻ từ khóa: ', 'meta_keyword', null, ['input' => ['data-role' => 'tagsinput'], 'label' => ['style' => 'display: block']]) !!}
                                {{-- description --}}
                                {!! FormHelper::textarea('Thẻ miêu tả', 'meta_description','',['input' => ['style'=>'height:55px', 'data-id' => 1, 'data-width' => '200px']]) !!}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn blue"> Thêm </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
        <div class="col-xs-8">
            <div class="portlet light bordered">
                @include('product::category.partials.portlet-button-title')
                <div class="portlet-body">
                    {!! Form::open(['id' => 'product-categories-list']) !!}
                    <input type="hidden" name="_method" value="" />
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-toggle-link="{{ route('admin.product.category.toggle') }}" data-delete-link="{{ route('admin.product.category.destroy') }}" data-find-link="{{ route('admin.product.category.find') }}" >
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Tên mục sản phẩm</th>
                            {{--<th> Slug </th>--}}
                            <th> Số lượng </th>
                            <th> Sắp xếp </th>
                            <th> Kích hoạt </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <thead>
                        <tr>
                            <td> </td>
                            <td>
                                <select name="product_categories" class="form-control form-filter input-sm" id="product_categories">
                                    @foreach($category_list as $key=>$category)
                                        <option value="{{ $key }}">{{ $category }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        </thead>
                        <tbody id="engine">
                            @foreach($product_categories as $product_category)
                                <tr class="odd gradeX">
                                    <td><input type="checkbox" name="id[]" class="checkboxes" value="{{ $product_category->id }}" /> </td>
                                    <td class="item-name"><a href="{{ route('admin.product-category.show', $product_category->id) }}">{{ $product_category->name  }}</a></td>
                                    {{--<td class="item-id"><a href="{{ route("admin.product.category.product", $product_category->id) }}"> {{ $product_category->slug }} </a> </td>--}}
                                    <td align="center">{{ count($product_category->childProducts()) }}</td>
                                    <td align="center">
                                        <a href="#" class="x-editable" id="order" data-pk="{{ $product_category->id }}" data-type="text" data-url="{{ route("admin.product.category.updates") }}" data-title="Số thứ tự">{{ $product_category->order }}</a>
                                    </td>
                                    <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa {{ $product_category->active == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
                                    <td align="center">
                                        {!! ViewHelper::button('Sửa ', $product_category->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']) !!}
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
