<?php namespace Modules\Blog\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;
use Modules\Core\Composers\BaseSidebarViewComposer;

class SidebarViewComposer extends BaseSidebarViewComposer
{
    public function compose(View $view)
    {
        $view->items->put('blog', Collection::make([
            [
                'weight' => '3',
                'request' => Request::is("*/{$view->prefix}/blog/posts*") or Request::is("*/{$view->prefix}/blog/categories*"),
                'route' => '#',
                'icon-class' => 'fa fa-copy',
                'title' => 'Blog',
                'permission' => $this->auth->hasAccess('blog.posts.index') or $this->auth->hasAccess('blog.categories.index'),
            ],
            [
                'request' => "*/{$view->prefix}/blog/posts*",
                'route' => 'admin.blog.post.index',
                'icon-class' => 'fa fa-file-text',
                'title' => 'Posts',
                'permission' => $this->auth->hasAccess('blog.posts.index')
            ],
            [
                'request' => "*/{$view->prefix}/blog/categories*",
                'route' => 'admin.blog.category.index',
                'icon-class' => 'fa fa-file-text',
                'title' => 'Categories',
                'permission' => $this->auth->hasAccess('blog.categories.index')
            ],
        ]));
    }
}
