@extends('admin.layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                @include('admin.partials.portlet-title')
                <div class="portlet-body">
                    @include('admin.partials.portlet-toolbar')
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-delete-link="{{ route('admin.member.group.destroy') }}" data-toggle-link="{{ route('admin.member.group.toggle') }}">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Tên nhóm </th>
                            <th> Sắp xếp </th>
                            <th> Kích hoạt </th>
                            <th> Ngày tạo </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($memberGroups as $memberGroup )
                            <tr class="odd gradeX">
                                <td><input type="checkbox" class="checkboxes" value="{{ $memberGroup->id }}" /> </td>
                                <td><a href="{{ route('admin.member-group.show', $memberGroup->id) }}">{{ $memberGroup->getName() }}</a> </td>
                                <td align="center">
                                    <a href="#" class="x-editable" id="order" data-pk="{{ $memberGroup->id }}" data-type="text" data-url="{{ route("admin.member.group.updates") }}" data-title="Số thứ tự">{{ $memberGroup->order }}</a>
                                </td>
                                <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa {{ $memberGroup->active == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
                                <td> {{ $memberGroup->created_at  }}</td>
                                <td align="center">
                                    {!! ViewHelper::button('Sửa ', $memberGroup->getEditLink() , 'link', ['icon' => 'icon-pencil', 'size' => 'xs']) !!}
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