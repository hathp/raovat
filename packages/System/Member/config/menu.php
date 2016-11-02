<?php


return [
    'admin_member' => [
        ['label' => 'Thành viên', 'url' => 'javascript:;', 'name' => 'member', 'icon' => 'icon-bulb'],
        ['label' => 'Thành viên', 'route' => 'admin.member.index', 'icon' => 'icon-bulb', 'parent' => 'member'],
        ['label' => 'Nhóm thành viên', 'route'=> 'admin.member-group.index' , 'icon' => 'icon-bulb', 'parent' => 'member'],
    ]
];