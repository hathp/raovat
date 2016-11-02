<div class="form-body edit">
		<div class="col-xs-6">
			{{-- Category name --}}
			{!! FormHelper::text('Tên ngôn ngữ', 'name', null, ['input' => ['required']]) !!}
			{{-- Category name --}}
			{!! FormHelper::text('Mã', 'code', null, ['input' => ['required']]) !!}
			@if($currency->id == $currency->getDefault()->id)
				{!! FormHelper::text('Tỉ giá', 'value', null, ['input' => ['required','class'=>'mask-numeric','readonly']]) !!}
			@else
				{{-- Category name --}}
				{!! FormHelper::text('Tỉ giá', 'value', null, ['input' => ['required','class'=>'mask-numeric']]) !!}
			@endif
			{{-- Category name --}}
			{!! FormHelper::text('Thập phân', 'decimal', null, ['input' => ['required','class'=>'mask-numeric']]) !!}
		</div>
		<div class="col-xs-6">
			{{-- Category name --}}
			{!! FormHelper::text('Kí tự trái', 'symbol_left') !!}
			{{-- Category name --}}
			{!! FormHelper::text('Kí tự phải', 'symbol_right') !!}
			{{-- Order --}}
			{!! FormHelper::text('Sắp xếp', 'order',null,['input' => ['class'=>'mask-numeric']]) !!}
			{{-- Active --}}
			{!! FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0]]) !!}
		</div>
    <hr />
<hr />
</div>
