@extends('hoster-config::layout.main')
@section('js-page-script')
<script>
    $(".colorbox").colorbox({rel:'colorbox'});
</script>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-4">
            <h4>Thêm mới</h4>
            {!! Form::open(['route' => 'admin.language.store', 'files']) !!}
                <div class="form-body" id="option">

                    {{-- Category name --}}
                    {!! FormHelper::text('Tên', 'name', null, ['input' => ['required']]) !!}
                    {{-- Category name --}}
                    {!! FormHelper::text('Tên định dạng', 'lang', null, ['input' => ['required']]) !!}
                    {{-- Active --}}
                    <div class="row">
                        <div class="col-xs-8">
                            {!! FormHelper::text('Sắp xếp', 'order',null,['input' => ['class'=>'mask-numeric']]) !!}
                        </div>
                        <div class="col-xs-4" style="margin-top: 30px;">
                            {!! FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0,'checked'=>'checked']]) !!}
                        </div>
                    </div>
                    <hr />
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn blue">Thêm</button>
                </div>
            {!! Form::close() !!}
        </div>
        <div class="col-xs-8">
            <div class="portlet light bordered">
                @include('admin.partials.portlet-title')
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-toggle-link="{{ route('admin.language.toggle') }}" data-delete-link="{{ route('admin.language.destroy') }}">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Tên </th>
                            <th> Định dạng </th>
                            <th> Sắp xếp </th>
                            <th> Kích hoạt </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($languages as $language)
                                <tr class="odd gradeX">
                                    <td><input type="checkbox" class="checkboxes" value="{{ $language->id }}" /> </td>
                                    <td><a href="{{ route('admin.language.show', $language->id) }}">{{ $language->name  }}</a></td>
                                    <td align="center"> {{ $language->lang }}</td>
                                    <td align="center">
                                        <a href="#" class="x-editable" id="order" data-pk="{{ $language->id }}" data-type="text" data-url="{{ route("admin.languages.updates") }}" data-title="Số thứ tự">{{ $language->order }}</a>
                                    </td>
                                    <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa {{ $language->active == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
                                    <td align="center">
                                        {!! ViewHelper::button('Sửa ', $language->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs','class' => 'colorbox']) !!}
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