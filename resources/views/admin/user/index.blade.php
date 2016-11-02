@extends('admin.layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                @include('admin.user.partials.portlet-button-title')
                <div class="portlet-body">
                    @include('admin.partials.portlet-toolbar')
                    {!! Form::open(['class' => 'user-list', 'route' => ['admin.user.destroy', 0]]) !!}
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-delete-link="{{ route('admin.user.destroy', 0) }}" data-toggle-link="{{ route('admin.user.toggle') }}" >
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Tên </th>
                            <th> Email </th>
                            <th> Nhóm </th>
                            <th> Ngày tham gia </th>
                            <th> Kích hoạt </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user )
                            <tr class="odd gradeX">
                                <td><input type="checkbox" class="checkboxes" name="id[]" value="{{ $user->id }}" /> </td>
                                <td class="item-name"><a href="{{ route('admin.user.show', $user->id) }}">{{ $user->getName() }}</a> </td>
                                <td class="item-id"><a href="mailto:{{ $user->email }}"> {{ $user->getEmail() }} </a></td>
                                <td>
                                    @foreach($user->roles as $role)
                                        {!! ViewHelper::badge($role->name) !!}
                                    @endforeach
                                </td>
                                <td class="center"> {{ $user->getJoinDate() }} </td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa {{ $user->active == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
                                <td align="center">
                                    {!! ViewHelper::button('Sửa ', $user->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']) !!}
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