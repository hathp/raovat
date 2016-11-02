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
            {!! Form::open(['route' => 'admin.currency.store', 'files']) !!}
                <div class="form-body" id="option">

                    {{-- Category name --}}
					{!! FormHelper::text('Tên ngôn ngữ', 'name', null, ['input' => ['required']]) !!}
					{{-- Category name --}}
					{!! FormHelper::text('Mã', 'code', null, ['input' => ['required']]) !!}
					{{-- Category name --}}
					{!! FormHelper::text('Tỉ giá', 'value', null, ['input' => ['required','class'=>'mask-numeric']]) !!}
					{{-- Category name --}}
					{!! FormHelper::text('Thập phân', 'decimal', null, ['input' => ['required','class'=>'mask-numeric']]) !!}
					
                    <div class="row">
                        <div class="col-xs-6">
							{{-- Category name --}}
							{!! FormHelper::text('Kí tự trái', 'symbol_left') !!}
                            {!! FormHelper::text('Sắp xếp', 'order',null,['input' => ['class'=>'mask-numeric']]) !!}
                        </div>
                        <div class="col-xs-6" >
						{!! FormHelper::text('Kí tự phải', 'symbol_right') !!}
                            {!! FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0,'checked'=>'checked','style'=>'margin-top: 30px;']]) !!}
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
                    <table class="table table-striped table-bordered table-hover table-checkable order-column data-table-checkable" data-toggle-link="{{ route('admin.currency.toggle') }}" data-delete-link="{{ route('admin.currency.destroy') }}">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="group-checkable" data-set=".data-table-checkable .checkboxes" /></th>
                            <th> Tên </th>
							<th> Mã </th>
                            <th> Tỉ giá </th>
                            <th> Sắp xếp </th>
                            <th> Kích hoạt </th>
                            <th> Hành động </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($currencies as $currency)
                                <tr class="odd gradeX">
                                    <td><input type="checkbox" class="checkboxes" value="{{ $currency->id }}" /> </td>
                                    <td><a href="{{ route('admin.currency.show', $currency->id) }}">{{ $currency->name  }}</a></td>
                                    <td align="center"> {{ $currency->code }}</td>
									<td align="center"> {{ $currency->value }}</td>
                                    <td align="center">
							
                                        <a href="#" class="x-editable" id="order" data-pk="{{ $currency->id }}" data-type="text" data-url="{{ route("admin.currencies.updates") }}" data-title="Số thứ tự">{{ $currency->order }}</a>
                                    </td>
                                    <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa {{ $currency->active == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
                                    <td align="center">
										@if($currency->default != $currencies->max('default'))
									    <a href="{{ $currency->getDefaultlink() }}" class="toggle-item colorbox" title="gán là tiền tệ mặc định"><i class="fa fa-check fa-lg" ></i></a>
										@endif
                                        {!! ViewHelper::button('Sửa ', $currency->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs','class' => 'colorbox']) !!}
                                        @if($currency->default != $currencies->max('default'))
											{!! ViewHelper::button('Xóa ', null, 'link', ['icon' => 'icon-trash', 'class' => 'delete-item', 'size'=>'xs', 'color' => 'red', 'data-toggle' => 'confirmation']) !!}
										@endif
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