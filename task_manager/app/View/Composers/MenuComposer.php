<?php
namespace App\View\Composers;
use Illuminate\View\View;

class MenuComposer {
    public function compose(View $view)
    {
        $menus = [
            [
                'title' => 'Quản lý task',
                'route' => '#'
            ],
            [
                'title' => 'Quản lý user',
                'route' => '#'
            ]
            ,
            [
                'title' => 'Quản lý order',
                'route' => '#'
            ]
        ];

        $view->with('menus', $menus);
    }
}