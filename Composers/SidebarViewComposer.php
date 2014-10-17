<?php namespace Modules\Blog\Composers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;
use Illuminate\View\View;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        $view->items->put('blog', Collection::make([
            [
                'weight' => '3',
                'request' => Request::is("*/{$view->prefix}/posts*") or Request::is("*/{$view->prefix}/categories*"),
                'route' => '#',
                'icon-class' => 'fa fa-copy',
                'title' => 'Blog',
            ],
            [
                'request' => "*/{$view->prefix}/posts*",
                'route' => 'dashboard.post.index',
                'icon-class' => 'fa fa-file-text',
                'title' => 'Posts',
            ],
            [
                'request' => "*/{$view->prefix}/categories*",
                'route' => 'dashboard.category.index',
                'icon-class' => 'fa fa-file-text',
                'title' => 'Categories',
            ]
        ]));
    }
}
