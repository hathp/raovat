<div class="form-body edit">

    {{-- Category name --}}
    {!! FormHelper::text('Tên ngôn ngữ', 'name', null, ['input' => ['required']]) !!}
	{{-- Category name --}}
    {!! FormHelper::text('Tên định dạng ngôn ngữ', 'lang', null, ['input' => ['required']]) !!}
    {{-- Order --}}
    {!! FormHelper::text('Sắp xếp', 'order',null,['input' => ['class'=>'mask-numeric']]) !!}
    {{-- Active --}}
    {!! FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0]]) !!}

    <hr />

</div>
