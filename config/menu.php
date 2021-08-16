<?php

return [
    [
        'label' => 'Product',
        'name' => 'products',
        'icon' =>  'fab fa-dropbox',
        'child_item' => [
            [
                'label' => 'List Product',
                'route' =>  'products.index',
            ],
            [
                'label' => 'Add Product',
                'route' =>  'products.create',
            ]
        ]
    ],
    [
        'label' => 'Category',
        'name' => 'categories',
        'icon' =>  'fas fa-chart-pie',
        'child_item' => [
            [
                'label' => 'Category Management',
                'route' =>  'categories.index',
            ]
        ]
    ],
    [
        'label' => 'Order',
        'name' => 'order',
        'icon' =>  'fas fa-file-invoice-dollar',
        'child_item' => [
            [
                'label' => 'Order Management',
                'route' =>  'backend.order.show',
            ]
        ]
    ],
    [
        'label' => 'Color',
        'name' => 'colors',
        'icon' =>  'fas fa-palette',
        'child_item' => [
            [
                'label' => 'Color Management',
                'route' =>  'colors.index',
            ]
        ]
    ],
    [
        'label' => 'Size',
        'name' => 'sizes',
        'icon' =>  'fas fa-crop-alt',
        'child_item' => [
            [
                'label' => 'Size Management',
                'route' =>  'sizes.index',
            ]
        ]
    ],
    [
        'label' => 'Post',
        'name' => 'posts',
        'icon' =>  'fas fa-pencil-alt',
        'child_item' => [
            [
                'label' => 'List Posts',
                'route' =>  'categories.index',
            ]
        ]
    ],
    [
        'label' => 'Account',
        'name' => 'accounts',
        'icon' =>  'fas fa-user-circle',
        'child_item' => [
            [
                'label' => 'List Account',
                'route' =>  'categories.index',
            ]
        ]
    ],
    [
        'label' => 'Banner',
        'name' => 'banners',
        'icon' =>  'fas fa-images',
        'child_item' => [
            [
                'label' => 'List Banner',
                'route' =>  'categories.index',
            ]
        ]
    ],

];
