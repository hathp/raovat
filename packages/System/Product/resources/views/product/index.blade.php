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
                    @include('product::partials.portlet-toolbar')
                    {!! Form::open(['class' => 'user-list']) !!}
                    {!! Form::hidden('_method', '') !!}
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-delete-link="{{ route('admin.product.destroy') }}" data-toggle-link="{{ route('admin.product.toggle') }}" data-featured-link="{{ route('admin.product.featured') }}">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                                <th> Tiêu đề </th>
                                <th> Danh mục </th>
                                <th> Người đăng </th>
                                <th> Ngày đăng </th>
                                <th> Sắp xếp </th>
                                <th> Đăng bài </th>
                                <th> Index </th>
                                <th> Hành động </th>
                            </tr>
                        </thead>
                        <thead>
                        <tr>
                            <td> </td>
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
                            <td> </td>
                            <td> </td>
                        </tr>
                        </thead>
                        <tbody id="engine">

                        @foreach($products as $product )
                            <tr class="odd gradeX">
                                <td ><input type="checkbox" name="id[]" class="checkboxes" value="{{ $product->id }}" /> </td>
                                <td class="item-name"><a href="{{ $product->getShowLink()  }}">{{ \Core\Text\Process::extractNumberOfWord($product->getTitle(), 6) }} ...</a> </td>
                                <td class="item-id">
                                    @foreach($product->categories as $category)
                                        <a href="">{{ $category->getName() }}</a>
                                    @endforeach
                                </td>
                                <td><a href="#">{{ $product->user->getName()  }}</a></td>
                                <td>
                                    @datetime($product->published_at)
                                </td>
                                <td align="center">
                                    <a href="#" class="x-editable" id="order" data-pk="{{ $product->id }}" data-type="text" data-url="{{ route("admin.product.updates") }}" data-title="Số thứ tự">{{ $product->order }}</a>
                                </td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="publish" ><i class="fa {{ $product->publish == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="featured" ><i class="fa {{ $product->featured == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
                                <td align="center">
                                    {!! ViewHelper::button('Sửa ', $product->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']) !!}
                                    {!! ViewHelper::button('Xóa ', null, 'link', ['icon' => 'icon-trash', 'class' => 'delete-item', 'size'=>'xs', 'color' => 'red', 'data-toggle' => 'confirmation']) !!}
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