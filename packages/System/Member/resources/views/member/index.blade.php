@extends('member::layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                @include('member::member.partials.portlet-button-title')
                <div class="portlet-body">
                    @include('member::partials.portlet-toolbar')
                    {!! Form::open(['class' => 'member-list']) !!}
                    {!! Form::hidden('_method', '') !!}
                    <table  class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-delete-link="{{ route('admin.member.destroy') }}" data-toggle-link="{{ route('admin.member.toggle') }}">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                                <th> Tên thành viên </th>
                                <th> Nhóm thành viên </th>
                                <th> Ngày đăng </th>
                                <th> Sắp xếp </th>
                                <th> Đăng bài </th>
                                <th> Hành động </th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td>
                                    <select name="categories" class="form-control form-filter input-sm" id="find">
                                        @foreach($member_groups as $member_group)
                                            <option value="{{ $member_group->id }}">{{ $member_group->name }}</option>
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
                        @foreach($members as $member )
                            <tr class="odd gradeX">
                                <td><input type="checkbox" name="id[]" class="checkboxes" value="{{ $member->id }}" /> </td>
                                <td class="item-name"><a href="{{ route("admin.member.show", $member->id) }}">{{ $member->name }} ...</a> </td>
                                <td class="item-id">
                                        <a>{{ $$member->member_groups()->get()->name }}</a>
                                </td>
                                <td><a href="#"></a></td>
                                <td>
                                    @datetime($member->published_at)
                                </td>
                                <td align="center">
                                    <a href="#" class="x-editable" id="order" data-pk="{{ $member->id }}" data-type="text" data-url="{{ route("admin.member.updates") }}" data-title="Số thứ tự">{{ $member->order }}</a>
                                </td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa {{ $member->active == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
                                <td align="center">
                                    {!! ViewHelper::button('Sửa ', route("admin.member.edit", $member->id), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']) !!}
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