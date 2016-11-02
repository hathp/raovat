@extends('admin.layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                @include('admin.partials.portlet-title')
                <div class="portlet-body">
                    @include('admin.partials.portlet-toolbar')
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-delete-link="{{ route('admin.role.destroy', 0) }}" data-toggle-link="{{ route('admin.role.toggle') }}">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Tên nhóm </th>
                            <th> Thành viên </th>
                            <th> Toàn quyền </th>
                            <th> Try cập admin </th>
                            <th> Kích hoạt </th>
                            <th> Ngày tạo </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role )
                            <tr class="odd gradeX">
                                <td><input type="checkbox" class="checkboxes" value="{{ $role->id }}" /> </td>
                                <td><a href="{{ route('admin.role.show', $role->id) }}">{{ $role->getName() }}</a> </td>
                                <td align="center">{{ $role->countMember() }}</td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="super_admin" ><i class="fa {{ $role->super_admin == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="admin" ><i class="fa {{ $role->admin == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa {{ $role->active == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
                                <td> {{ $role->created_at  }}</td>
                                <td align="center">
                                    {!! ViewHelper::button('Sửa ', $role->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']) !!}
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