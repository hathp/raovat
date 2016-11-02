<?php


return [
    'admin_comment' => [
        ['label' => 'Quản lý bình luận', 'url' => 'javascript:;', 'name' => 'comment', 'icon' => 'icon-speech'],
//        ['label' => 'Bình luận sản phẩm', 'route' => 'admin.comment.product.index', 'name' => 'slide', 'icon' => 'icon-speech', 'parent' => 'comment'],
		['label' => 'Bình luận bài viết', 'route' => 'admin.comment.page.index',  'name' => 'banner', 'icon' => 'icon-speech', 'parent' => 'comment'],
    ]
];