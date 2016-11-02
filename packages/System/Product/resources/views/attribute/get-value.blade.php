@if(!empty($attributes->toArray()))
    @foreach($attributes as $attribute)
        <div class="attributes">
            <div class="form-group">
                <div class="note note-success col-md-3">
                    {{ $attribute->name  }}
                </div>
                <div class="col-md-9 attribute-list">
                    <div id='attributes_content_{{ $attribute->id }}' class="attribute">
                        @if(count($attribute->productAttributes()->where('product_id',$product_id)->get())>0)
                            @foreach($attribute->productAttributes()->where('product_id',$product_id)->get() as $productAttribute)
                                @include('product::attribute.partials.attribute-value')
                            @endforeach
                        @else
                            @include('product::attribute.partials.attribute-value')
                        @endif
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 30px;">
                <div class="col-xs-12">
                    <a href="javascript:;" class="btn btn-icon-only  blue  plus" ><i class="fa fa-plus"></i>  </a>
                </div>
            </div>
        </div>
    @endforeach
@else
    {!! FormHelper::text('Số lượng', 'total', null, ['input' => ['style'=>'width:300px;','class'=>'mask-currency','required']]) !!}
@endif