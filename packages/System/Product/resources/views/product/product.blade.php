@foreach($products as $product )
    <tr class="odd gradeX">
        <td ><input type="checkbox" name="id[]" class="checkboxes" value="{{ $product->id }}" /> </td>
        <td class="item-name"><a href="{{ $product->getShowLink()  }}">{{ \Core\Text\Process::extractNumberOfWord($product->getTitle(), 6) }} ...</a> </td>
        <td class="item-id">
            @foreach($product->categories as $category)
                <a href="">{{ $category->getName() }}</a>
            @endforeach
        </td>
        <td><a href="#">{{ $product->user->getName()  }}</a></td>
        <td>
            @datetime($product->published_at)
        </td>
        <td align="center">
            <a href="#" class="x-editable" id="order" data-pk="{{ $product->id }}" data-type="text" data-url="{{ route("admin.product.updates") }}" data-title="Số thứ tự">{{ $product->order }}</a>
        </td>
        <td align="center"><a href="javascript:;" class="toggle-item" data-property="publish" ><i class="fa {{ $product->publish == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
        <td align="center"><a href="javascript:;" class="toggle-item" data-property="featured" ><i class="fa {{ $product->featured == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
        <td align="center">
            {!! ViewHelper::button('Sửa ', $product->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']) !!}
            {!! ViewHelper::button('Xóa ', null, 'link', ['icon' => 'icon-trash', 'class' => 'delete-item', 'size'=>'xs', 'color' => 'red', 'data-toggle' => 'confirmation']) !!}
        </td>
    </tr>
@endforeach