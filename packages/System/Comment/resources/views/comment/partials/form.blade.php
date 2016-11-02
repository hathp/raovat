<div class="tab-content">
    <div class="tab-pane active" id="content">
        <div>
            <div class="row">
                <div class="col-xs-9">
                    {{--  name --}}
                    {!! FormHelper::text('Tên', 'name', null, ['input' => ['required']]) !!}

					{{-- link --}}
                    {!! FormHelper::text('Link', 'link', null, ['input' => ['required']]) !!}
					
					{{-- Order --}}
                    {!! FormHelper::text('Sắp xếp', 'order', null, ['input' => ['class'=>'mask-currency']]) !!}
                    
                </div>
                <div class="col-xs-3">
                    {{-- Cover Image --}}
                    {!! FormHelper::imageInput('Hình ảnh', 'path', isset($image) ? $image->getLink(config('layout-image.image_layout.thumbnail.path')) : null) !!}

                 
                    {{-- Active --}}
                    {!! FormHelper::checkbox('Kích hoạt', 'active', 1, null, ['input' => ['default' => 0, 'checked'=>'checked']]) !!}

                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="meta">
        
    </div>
</div>
