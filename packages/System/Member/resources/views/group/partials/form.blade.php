<div class="form-body">
    <div class="row">
        <div class="col-xs-9">
            {{-- Category name --}}
            {!! FormHelper::text('Tên', 'name', null, ['input' => ['required']]) !!}

        </div>
        <div class="col-xs-3">

            {{-- Order --}}
            {!! FormHelper::text('Sắp xếp', 'order', null, ['input' => ['class'=>'mask-currency']]) !!}
            {{-- language --}}
{{--            {!! FormHelper::select('Ngôn ngữ', 'language_id', $lang_list, null, ['input' => ['required']]) !!}--}}
            {{-- Active --}}
            {!! FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0,'checked'=>'checked']]) !!}
        </div>
    </div>


</div>

<div class="form-actions">
    @include('admin.partials.form-submit-button')
</div>