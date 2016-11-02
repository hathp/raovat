@foreach($page_categories as $page_category)
    <tr class="odd gradeX">
        <td><input type="checkbox" name="id[]" class="checkboxes" value="{{ $page_category->id }}" /> </td>
        <td class="item-name"><a href="{{ route("admin.article.category.show", $page_category->id) }}">{{ $page_category->name  }}</a></td>
{{--        <td class="item-id"><a href="{{ route("admin.article.category.page", $page_category->id) }}">{{ $page_category->slug }}</a></td>--}}
        <td align="center">{{ count($page_category->childPages()) }}</td>
        <td align="center">
            <a href="#" class="x-editable" id="order" data-pk="{{ $page_category->id }}" data-type="text" data-url="{{ route("admin.$page_category_slug.category.updates") }}" data-title="Số thứ tự">{{ $page_category->order }}</a>
        </td>
        <td align="center"><a href="javascript:;" class="toggle-item" data-property="active" ><i class="fa {{ $page_category->active == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>

        <td>
            {!! ViewHelper::button('Sửa ', $page_category->getEditLink(), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']) !!}
            {!! ViewHelper::button('Xóa ', null, 'link', ['icon' => 'icon-trash', 'class' => 'delete-item', 'size'=>'xs', 'color' => 'red', 'data-toggle' => 'confirmation']) !!}
        </td>
    </tr>
@endforeach