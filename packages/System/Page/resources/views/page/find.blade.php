@foreach($pages as $page )
    <tr class="odd gradeX">
        <td><input type="checkbox" name="id[]" class="checkboxes" value="{{ $page->id }}" /> </td>
        <td class="item-name"><a href="{{ route("admin.$page_category_slug.show", $page->id) }}">{{ \Core\Text\Process::extractNumberOfWord($page->getTitle(), 6) }} ...</a> </td>
        <td class="item-id">
            @foreach($page->categories as $category)
                <a href="{{ route('admin.article.category.page', $category->id) }}">{{ $category->getName() }}</a>
        </td>
        <td><a href="#">{{ $page->user->getName()  }}</a></td>
        <td>
            @endforeach
            @datetime($page->published_at)
        </td>
        <td align="center">
            <a href="#" class="x-editable" id="order" data-pk="{{ $page->id }}" data-type="text" data-url="{{ route("admin.$page_category_slug.updates") }}" data-title="S? th? t?">{{ $page->order }}</a>
        </td>
        <td align="center"><a href="javascript:;" class="toggle-item" data-property="publish" ><i class="fa {{ $page->publish == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
        <td align="center"><a href="javascript:;" class="toggle-item" data-property="featured" ><i class="fa {{ $page->featured == 1 ? 'fa-check' : 'fa-times' }} fa-lg"></i></a></td>
        <td align="center">
            {!! ViewHelper::button('Sửa ', route("admin.$page_category_slug.edit", $page->id), 'link', ['icon' => 'icon-pencil', 'size' => 'xs']) !!}
            {!! ViewHelper::button('Xóa ', null, 'link', ['icon' => 'icon-trash', 'class' => 'delete-item', 'size'=>'xs', 'color' => 'red', 'data-toggle' => 'confirmation']) !!}
        </td>
    </tr>
@endforeach