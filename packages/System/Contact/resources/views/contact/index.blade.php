@extends('contact::layout.main')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="portlet light bordered">
                @include('contact::contact.partials.portlet-button-title')
                <div class="portlet-body">
                    
                    {!! Form::open(['class' => 'contact-list']) !!}
                    {!! Form::hidden('_method', '') !!}
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-delete-link="{{ route('admin.contact.destroy')  }}"  >
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Họ Tên</th>
                            <th> Email </th>
                            <th> Phone </th>
                            <th> Ngày liên hệ </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact )
                            <tr class="odd gradeX">
                                <td><input type="checkbox" name="id[]" class="checkboxes" value="{{ $contact->id }}" /> </td>
                                <td class="item-name">{{ $contact->name }} </td>
                                <td align="center">{{ $contact->email }}</td>
                                <td align="center">{{ $contact->phone }}</td>
                                <td align="center">{{ $contact->created_at }}</td>
                                <td align="center">
                                    {!! ViewHelper::button('Sửa ', route("admin.contact.edit", $contact->id), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']) !!}
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