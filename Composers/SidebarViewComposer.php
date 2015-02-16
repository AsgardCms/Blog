<?php namespace Modules\Blog\Composers;

use Illuminate\Contracts\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;
use Modules\Core\Composers\BaseSidebarViewComposer;

class SidebarViewComposer extends BaseSidebarViewComposer
{
    public function compose(View $view)
    {
        $view->sidebar->group(trans('core::sidebar.content'), function (SidebarGroup $group) {
            $group->weight = 50;
            $group->authorize(
                $this->auth->hasAccess('blog.posts.index') or $this->auth->hasAccess('blog.categories.index')
            );

            $group->addItem(trans('blog::blog.title'), function (SidebarItem $item) {

                $item->icon = 'fa fa-copy';
                $item->weight = 0;

                $item->addItem(trans('blog::post.title.post'), function (SidebarItem $item) {
                    $item->icon = 'fa fa-copy';
                    $item->weight = 0;
                    $item->append('admin.blog.post.create');
                    $item->route('admin.blog.post.index');
                    $item->authorize(
                        $this->auth->hasAccess('blog.posts.index')
                    );
                });

                $item->addItem(trans('blog::category.title.category'), function (SidebarItem $item) {
                    $item->icon = 'fa fa-file-text';
                    $item->weight = 1;
                    $item->route('admin.blog.category.index');
                    $item->append('admin.blog.category.create');
                    $item->authorize(
                        $this->auth->hasAccess('blog.categories.index')
                    );
                });
            });
        });
    }
}
