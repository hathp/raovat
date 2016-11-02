@extends('page::layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-4">
            <h4>Thêm mới</h4>
            {!! Form::open(['url' => $store_link, 'files']) !!}
                @include('page::category.partials.form')

                <div class="form-actions">
                    <button type="submit" class="btn blue">Thêm</button>
                </div>

            {!! Form::close() !!}
        </div>
        <div class="col-xs-8">
            <div class="portlet light bordered">
                @include('page::category.partials.portlet-button-title')
                <div class="portlet-body">
                    {!! Form::open(['id' => 'page-categories-list']) !!}
                        <input type="hidden" name="_method" value="" />
                        <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-toggle-link="{{ route('admin.category.toggle') }}" data-delete-link="{{ $delete_link }}" data-category-link="{{ $category_link }}">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                                    <th> Tên </th>
                                    <th> Bài viết </th>
                                    <th> Sắp xếp </th>
                                    <th> Kích hoạt </th>
                                    <th> Hành động </th>
                                </tr>
                            </thead>
                            <thead>
                            <tr>
                                <td> </td>
                                <td>
                                    <select name="categories" class="form-control form-filter input-sm" id="find">
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
                                @foreach($page_categories as $page_category)
                                    <tr class="odd gradeX">
                                        <td><input type="checkbox" name="id[]" class="checkboxes" value="{{ $page_category->id }}" /> </td>
                                        <td class="item-name"><a href="{{ route("admin.article.category.show", $page_category->id) }}">{{ $page_category->name  }}</a></td>
{{--                                        <td class="item-id"><a href="{{ route("admin.article.category.page", $page_category->id) }}">{{ $page_category->slug }}</a></td>--}}
                                        <td align="center">{{ count($page_category->childPages()) }}</td>
                                        <td align="center">
                                            <a href="#" class="x-editable" id="order" data-pk="{{ $page_category->id }}" data-type="text" data-url="{{ route("admin.$page_category_slug.category.updates") }}" data-title="Số thứ tự">{{ $page_category->order }}</a>
                                        </td>
                                        <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa {{ $page_category->active == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>

                                        <td>
                                            {!! ViewHelper::button('Sửa ', $page_category->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']) !!}
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
    @include('page::category.partials.confirmation-modal')
@endsection