<?php
return [
    'dashboard' => [
        'name' => 'Dashboard',
        'route' => 'index',
    ],
    'Admins' => [
        'name' => 'Admins',
        'submenu' => [
            'show' => [
                'name' => 'Show',
                'route' => 'adminsShow',
            ],
            'add' => [
                'name' => 'Add',
                'route' => 'adminsAdd',
            ],
        ],
    ],
    'category' => [
        'name' => 'Category',
        'submenu' => [
            'show' => [
                'name' => 'Show',
                'route' => 'categoryShow',
            ],
            'add' => [
                'name' => 'Add',
                'route' => 'categoryAdd',
            ],
        ],
    ],
    'news' => [
        'name' => 'News',
        'submenu' => [
            'show' => [
                'name' => 'Show',
                'route' => 'newsShow',
            ],
            'add' => [
                'name' => 'Add',
                'route' => 'newsAdd',
            ],
        ],
    ],
    'article' => [
        'name' => 'article',
        'submenu' => [
            'show' => [
                'name' => 'Show',
                'route' => 'articleShow',
            ],
            'add' => [
                'name' => 'Add',
                'route' => 'articleAdd',
            ],
        ],
    ],
    'admin_pages' => [
        'name' => 'AdminPages',
        'submenu' => [
            'profile' => [
                'name' => 'Profile',
                'route' => 'profile',
            ],
            'edit_profile' => [
                'name' => 'Sittings',
                'route' => 'editProfile',
            ],
        ],
    ],
    'Chat' => [
        'name' => 'Chat',
        'route' => 'chatAdmin_',
    ],
];
