<?php


return [
    'admin_page' => [
        ['label' => 'Giới thiệu', 'url' => 'javascript:;', 'name' => 'about', 'icon' => 'icon-bulb'],
        ['label' => 'Giới thiệu', 'route' => 'admin.about.index', 'name' => 'post', 'icon' => 'icon-bulb', 'parent' => 'about'],
        ['label' => 'Nhóm giới thiệu', 'route'=> 'admin.about.category.index' , 'icon' => 'icon-bulb', 'parent' => 'about'],

        ['label' => 'Dịch vụ', 'url' => 'javascript:;', 'name' => 'service', 'icon' => 'icon-book-open'],
        ['label' => 'Dịch vụ', 'route' => 'admin.service.index', 'name' => 'post', 'icon' => 'icon-book-open', 'parent' => 'service'],
        ['label' => 'Nhóm dịch vụ', 'route'=> 'admin.service.category.index' , 'icon' => 'icon-book-open', 'parent' => 'service'],


        ['label' => 'Khóa học', 'url' => 'javascript:;', 'name' => 'courses', 'icon' => 'icon-globe'],
        ['label' => 'Khóa học', 'route' => 'admin.courses.index', 'name' => 'post', 'icon' => 'icon-globe', 'parent' => 'courses'],
        ['label' => 'Nhóm Khóa học', 'route'=> 'admin.courses.category.index' , 'icon' => 'icon-globe', 'parent' => 'courses'],


        ['label' => 'Tin tức', 'url' => 'javascript:;', 'name' => 'article', 'icon' => 'icon-book-open'],
        ['label' => 'Tin tức', 'route' => 'admin.article.index', 'name' => 'post', 'icon' => 'icon-book-open', 'parent' => 'article'],
        ['label' => 'Nhóm tin tức', 'route'=> 'admin.article.category.index' , 'icon' => 'icon-book-open', 'parent' => 'article'],

        ['label' => 'Blog', 'url' => 'javascript:;', 'name' => 'blog', 'icon' => 'icon-book-open'],
        ['label' => 'Blog', 'route' => 'admin.blog.index', 'name' => 'post', 'icon' => 'icon-book-open', 'parent' => 'blog'],
        ['label' => 'Nhóm Blog', 'route'=> 'admin.blog.category.index' , 'icon' => 'icon-book-open', 'parent' => 'blog'],


    ]
];