@extends($package_name. '::layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                @include($package_name. '::classified.partials.portlet-button-title')
                <div class="portlet-body">
                    @include('admin.partials.portlet-toolbar')
                    {!! Form::open(['class' => 'classified-list']) !!}
                    {!! Form::hidden('_method', '') !!}
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable"  data-delete-link="{{ route('admin.classified.destroy') }}" data-toggle-link="{{ route('admin.classified.toggle') }}">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Tiêu đề </th>
                            <th> Danh mục </th>
                            <th> Quốc gia rao</th>
                            <th> Email </th>
                            <th> Lượt xem </th>
                            <th> Trang chủ </th>
                            <th> Đăng bài </th>
                            <th> Ngày đăng </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <thead>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <select class="form-control" name="classifieds_category_id" id="classifieds_category_id" onchange="location = this.value;">
                                    <option>Chọn danh mục</option>
                                    @foreach($categories as $classified_category)
                                        <optgroup label="{{ $classified_category->name }}">
                                            @if( count($classified_category->child()) )
                                                @foreach($classified_category->child() as $child_categories )
                                                    <option value="{{ route('admin.classified.index', ['category' => $child_categories->id]) }}">{{ $child_categories->name }}</option>
                                                @endforeach
                                            @endif
                                        </optgroup>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="classifieds_category_id" id="classifieds_category_id" onchange="location = this.value;">
                                    <option>Chọn quốc gia</option>
                                    @foreach($country_list as $key=>$country)
                                        <option value="{{ route('admin.classified.index', ['country' => $key]) }}">{{ $country }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($classifieds as $classified )
                            <tr class="odd gradeX">
                                <td><input type="checkbox" name="id[]" class="checkboxes" value="{{ $classified->id }}" /> </td>
                                <td class="item-name"><a href="{{ route('admin.classified.show', $classified->id) }}">{{ $classified->name }}</a> </td>
                                <td class="item-id">
                                        <a href="#">{{ $classified->categories->first()->name }}</a>
                                </td>
                                <td> {{ $classified->countries->name }} </td>
                                <td> {{ $classified->email }}</td>
                                <td> {{ $classified->view_counter }}</td>

                                {{--<td align="center">--}}
                                    {{--<a href="#" class="x-editable" id="order" data-pk="{{ $page->id }}" data-type="text" data-url="{{ route("admin.$page_category_slug.updates") }}" data-title="Số thứ tự">{{ $page->order }}</a>--}}
                                {{--</td>--}}
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="home" ><i class="fa {{ $classified->home == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="publish" ><i class="fa {{ $classified->publish == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
                                <td>
                                    @datetime($classified->created_at)
                                </td>
                                <td align="center">
                                    {!! ViewHelper::button('Sửa ', route('admin.classified.edit', $classified->id), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']) !!}
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