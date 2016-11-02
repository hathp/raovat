<?php


return [
    'admin_setting' => [
        ['label' => 'Cài đặt', 'url' => 'javascript:;', 'name' => 'setting', 'icon' => 'icon-settings'],
        ['label' => 'Thiết lập hệ thống', 'route' => 'admin.setting.index', 'icon' => 'icon-settings', 'parent' => 'setting'],
        ['label' => 'Quản lý ngôn ngữ', 'route' => 'admin.language.index', 'icon' => 'icon-settings', 'parent' => 'setting'],
		['label' => 'Quản lý quốc gia', 'route' => 'admin.country.index', 'icon' => 'icon-settings', 'parent' => 'setting'],
		['label' => 'Quản lý tiền tệ', 'route' => 'admin.currency.index', 'icon' => 'icon-settings', 'parent' => 'setting'],
        
    ]
];