<?php namespace Modules\Blog\Composers;

use Illuminate\Contracts\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;
use Modules\Core\Composers\BaseSidebarViewComposer;

class SidebarViewComposer extends BaseSidebarViewComposer
{
    public function compose(View $view)
    {
        $view->sidebar->group('Blog', function (SidebarGroup $group) {
            $group->weight = 7;
            $group->authorize(
                $this->auth->hasAccess('blog.posts.index') or $this->auth->hasAccess('blog.categories.index')
            );

            $group->addItem('Blog', function (SidebarItem $item) {

                $item->addItem('posts', function (SidebarItem $item) {
                    $item->route('admin.user.user.index');
                    $item->icon = 'fa fa-copy';
                    $item->name = 'Blog';
                    $item->authorize(
                        $this->auth->hasAccess('blog.posts.index')
                    );
                });

                $item->addItem('categories', function (SidebarItem $item) {
                    $item->route('admin.user.user.index');
                    $item->icon = 'fa fa-file-text';
                    $item->name = 'Categories';
                    $item->authorize(
                        $this->auth->hasAccess('blog.categories.index')
                    );
                });
            });

        });
    }
}
