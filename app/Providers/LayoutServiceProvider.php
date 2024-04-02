<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class LayoutServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Sử dụng view composer để truyền dữ liệu vào layout
        View::composer('layouts.layout', function ($view) {
            $sidebarMenu = [
                [
                    'name' => 'Quản lý Nhà sản xuất',
                    'children' => [
                        ['name' => 'Danh sách', 'route' => route('manufacturers.index')],
                        ['name' => 'Thêm mới', 'route' => route('manufacturers.create')]
                    ]
                ],
                [
                    'name' => 'Quản lý Danh mục',
                    'children' => [
                        ['name' => 'Danh sách', 'route' => route('categories.index')],
                        ['name' => 'Thêm mới', 'route' => route('categories.create')]
                    ]
                ],
            ];

            $view->with('sidebarMenu', $sidebarMenu);
        });
    }
}
