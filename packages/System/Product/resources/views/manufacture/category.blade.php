@foreach($product_categories as $product_category)
    <tr class="odd gradeX">
        <td><input type="checkbox" name="id[]" class="checkboxes" value="{{ $product_category->id }}" /> </td>
        <td class="item-name"><a href="{{ route('admin.product-category.show', $product_category->id) }}">{{ $product_category->name  }}</a></td>
        {{--<td class="item-id"><a href="{{ route("admin.product.category.product", $product_category->id) }}"> {{ $product_category->slug }} </a> </td>--}}
        <td align="center">{{ count($product_category->childProducts()) }}</td>
        <td align="center">
            <a href="#" class="x-editable" id="order" data-pk="{{ $product_category->id }}" data-type="text" data-url="{{ route("admin.product.category.updates") }}" data-title="Số thứ tự">{{ $product_category->order }}</a>
        </td>
        <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa {{ $product_category->active == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
        <td align="center">
            {!! ViewHelper::button('Sửa ', $product_category->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']) !!}
            {!! ViewHelper::button('Xóa ', null, 'link', ['icon' => 'icon-trash', 'class' => 'delete-item', 'size'=>'xs', 'color' => 'red', 'data-toggle' => 'confirmation']) !!}
        </td>
    </tr>
@endforeach
