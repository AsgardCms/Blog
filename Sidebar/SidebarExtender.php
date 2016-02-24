<?php namespace Modules\Blog\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
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
