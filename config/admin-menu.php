<?php


return [

    'admin_user' => [
        ['label' => 'Người dùng', 'link' => 'javascript:;', 'name' => 'user', 'icon' => 'icon-user'],
        ['label' => 'Tài khoản', 'route' => 'admin.user.index', 'name' => 'post', 'icon' => 'icon-key', 'parent' => 'user'],
        ['label' => 'Nhóm tài khoản', 'route' => 'admin.role.index', 'icon' => 'icon-users', 'parent' => 'user'],
    ]

];