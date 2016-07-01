<?php

namespace Modules\Blog\Widgets;

use Modules\Blog\Repositories\CategoryRepository;
use Modules\Dashboard\Foundation\Widgets\BaseWidget;

class CategoriesWidget extends BaseWidget
{
    /**
     * @var CategoryRepository
     */
    private $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    /**
     * Get the widget name
     * @return string
     */
    protected function name()
    {
        return 'CategoriesWidget';
    }

    /**
     * Get the widget view
     * @return string
     */
    protected function view()
    {
        return 'blog::admin.widgets.categories';
    }

    /**
     * Get the widget data to send to the view
     * @return string
     */
    protected function data()
    {
        return ['categoryCount' => $this->category->all()->count()];
    }

    /**
     * Get the widget type
     * @return string
     */
    protected function options()
    {
        return [
            'width' => '2',
            'height' => '2',
            'x' => '2',
        ];
    }
}
