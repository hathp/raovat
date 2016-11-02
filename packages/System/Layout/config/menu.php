<?php

return [
    'admin_layout' => [
        ['label' => 'Quản lý giao diện', 'url' => 'javascript:;', 'name' => 'layout', 'icon' => 'icon-screen-desktop'],
        ['label' => 'Slide', 'route' => 'admin.slide.index', 'name' => 'slide', 'icon' => 'icon-screen-desktop', 'parent' => 'layout'],
		['label' => 'Logo và Banner', 'route' => 'admin.banner.index',  'name' => 'banner', 'icon' => 'icon-screen-desktop', 'parent' => 'layout'],
    ]
];