@extends('page::layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                @include('page::page.partials.portlet-button-title')
                <div class="portlet-body">
                    @include('page::partials.portlet-toolbar')
                    {!! Form::open(['class' => 'page-list']) !!}
                    {!! Form::hidden('_method', '') !!}
                    <table  class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-delete-link="{{ $ajax_delete_link }}" data-toggle-link="{{ $ajax_toggle_link }}" data-featured-link="{{ $ajax_featured_link }}" data-category-link="{{ $ajax_category_link }}">
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
                                <td> </td>
                                <td> </td>
                            </tr>
                        </thead>

                        <tbody id="engine">
                        @foreach($pages as $page )
                            <tr class="odd gradeX">
                                <td><input type="checkbox" name="id[]" class="checkboxes" value="{{ $page->id }}" /> </td>
                                <td class="item-name"><a href="{{ route("admin.$page_category_slug.show", $page->id) }}">{{ \Core\Text\Process::extractNumberOfWord($page->getTitle(), 6) }} ...</a> </td>
                                <td class="item-id">
                                    @foreach($page->categories as $category)
                                        <a href="{{ route('admin.article.category.page', $category->id) }}">{{ $category->getName() }}</a>
                                </td>
                                <td><a href="#">{{ $page->user->getName()  }}</a></td>
                                <td>
                                    @endforeach
                                    @datetime($page->published_at)
                                </td>
                                <td align="center">
                                    <a href="#" class="x-editable" id="order" data-pk="{{ $page->id }}" data-type="text" data-url="{{ route("admin.$page_category_slug.updates") }}" data-title="Số thứ tự">{{ $page->order }}</a>
                                </td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="publish" ><i class="fa {{ $page->publish == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="featured" ><i class="fa {{ $page->featured == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
                                <td align="center">
                                    {!! ViewHelper::button('Sửa ', route("admin.$page_category_slug.edit", $page->id), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']) !!}
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