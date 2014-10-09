<?php namespace Modules\Blog\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Post;
use Modules\Blog\Entities\Tag;
use Modules\Blog\Repositories\Eloquent\EloquentCategoryRepository;
use Modules\Blog\Repositories\Eloquent\EloquentPostRepository;
use Modules\Blog\Repositories\Eloquent\EloquentTagRepository;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * The filters base class name.
     *
     * @var array
     */
    protected $filters = [
        'Core' => [
            'permissions' => 'PermissionFilter',
            'auth.admin' => 'AdminFilter',
        ]
    ];

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->booted(function ($app) {
            $this->registerFilters($app['router']);
            $this->registerBindings();
        });
    }

    /**
     * Register the filters.
     *
     * @param  Router $router
     * @return void
     */
    public function registerFilters(Router $router)
    {
        foreach ($this->filters as $module => $filters) {
            foreach ($filters as $name => $filter) {
                $class = "Modules\\{$module}\\Http\\Filters\\{$filter}";

                $router->filter($name, $class);
            }
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Blog\Repositories\PostRepository',
            function() {
                return new EloquentPostRepository(new Post);
            }
        );

        $this->app->bind(
            'Modules\Blog\Repositories\CategoryRepository',
            function() {
                return new EloquentCategoryRepository(new Category);
            }
        );

        $this->app->bind(
            'Modules\Blog\Repositories\TagRepository',
            function() {
                return new EloquentTagRepository(new Tag);
            }
        );
    }

}
