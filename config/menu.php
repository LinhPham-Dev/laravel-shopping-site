<?php

use App\Models\Backend\Category;
use App\Models\Backend\Color;
use App\Models\Backend\Product;
use App\Models\Backend\Size;
use App\Models\Order;
use App\Models\User;

// $total_categories = Category::all()->count();
// $total_products = Product::all()->count();
// $total_accounts = User::all()->count();
// $total_orders = Order::all()->count();
// $total_colors = Color::all()->count();
// $total_sizes = Size::all()->count();

return [
    [
        'label' => 'Product',
        'name' => 'products',
        'icon' =>  'fab fa-dropbox',
        // 'total' =>  $total_product,
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
        // 'total' =>  $total_categories,
        'child_item' => [
            [
                'label' => 'Category Management',
                'route' =>  'categories.index',
            ]
        ]
    ],
    [
        'label' => 'Order',
        'name' => 'orders',
        'icon' =>  'fas fa-file-invoice-dollar',
        // 'total' =>  $total_orders,
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
        // 'total' =>  $total_colors,
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
        // 'total' =>  $total_sizes,
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
        // 'total' =>  13,
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
        // 'total' =>  $total_accounts,
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
        // 'total' =>  6,
        'child_item' => [
            [
                'label' => 'List Banner',
                'route' =>  'categories.index',
            ]
        ]
    ],

];
