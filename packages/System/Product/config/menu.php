<?php


return [
    'admin_product' => [
        ['label' => 'Sản phẩm', 'url' => 'javascript:;', 'name' => 'product', 'icon' => 'icon-social-dropbox'],
        ['label' => 'Sản phẩm', 'route' => 'admin.product.index', 'name' => 'product', 'icon' => 'icon-social-dropbox', 'parent' => 'product'],
        ['label' => 'Nhóm sản phẩm', 'route'=> 'admin.product-category.index' , 'icon' => 'icon-social-dropbox', 'parent' => 'product'],
		['label' => 'Tùy chọn', 'route'=> 'admin.product-attribute.index' , 'icon' => 'fa fa-bicycle', 'parent' => 'product'],
        ['label' => 'Thuộc tính', 'route'=> 'admin.product-option.index' , 'icon' => 'fa fa-bicycle', 'parent' => 'product'],
		['label' => 'Hãng sản xuất', 'route'=> 'admin.product-manufacture.index' , 'icon' => 'fa fa-bicycle', 'parent' => 'product'],
		
    ]
];