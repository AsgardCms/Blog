<?php

namespace Modules\Blog\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;

class RegisterBlogSidebar extends \Modules\Core\Sidebar\AbstractAdminSidebar
{
    /**
     * Method used to define your sidebar menu groups and items
     * @param \Maatwebsite\Sidebar\Menu $menu
     * @return \Maatwebsite\Sidebar\Menu
     */
    public function extendWith(\Maatwebsite\Sidebar\Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('blog::blog.title'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(0);

                $item->item(trans('blog::post.title.post'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.blog.post.create');
                    $item->route('admin.blog.post.index');
                    $item->authorize(
                        $this->auth->hasAccess('blog.posts.index')
                    );
                });
                $item->item(trans('blog::tag.title.tag'), function (Item $item) {
                    $item->icon('fa fa-tags');
                    $item->weight(0);
                    $item->append('admin.blog.tag.create');
                    $item->route('admin.blog.tag.index');
                    $item->authorize(
                        $this->auth->hasAccess('blog.tags.index')
                    );
                });
                $item->item(trans('blog::category.title.category'), function (Item $item) {
                    $item->icon('fa fa-file-text');
                    $item->weight(1);
                    $item->route('admin.blog.category.index');
                    $item->append('admin.blog.category.create');
                    $item->authorize(
                        $this->auth->hasAccess('blog.categories.index')
                    );
                });
                $item->authorize(
                    $this->auth->hasAccess('blog.tags.index') || $this->auth->hasAccess('blog.posts.index') || $this->auth->hasAccess('blog.categories.index')
                );
            });
        });

        return $menu;
    }
}
