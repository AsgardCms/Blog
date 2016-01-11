<?php namespace Modules\Blog\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Post;
use Modules\Blog\Entities\Tag;
use Modules\Blog\Repositories\Cache\CacheCategoryDecorator;
use Modules\Blog\Repositories\Cache\CachePostDecorator;
use Modules\Blog\Repositories\Cache\CacheTagDecorator;
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
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../Config/config.php', 'asgard.blog.config');
        $this->publishes([__DIR__ . '/../Config/config.php' => config_path('asgard.blog.config' . '.php'), ], 'config');
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
            function () {
                $repository = new EloquentPostRepository(new Post());

                if (! Config::get('app.cache')) {
                    return $repository;
                }

                return new CachePostDecorator($repository);
            }
        );

        $this->app->bind(
            'Modules\Blog\Repositories\CategoryRepository',
            function () {
                $repository = new EloquentCategoryRepository(new Category());

                if (! Config::get('app.cache')) {
                    return $repository;
                }

                return new CacheCategoryDecorator($repository);
            }
        );

        $this->app->bind(
            'Modules\Blog\Repositories\TagRepository',
            function () {
                $repository = new EloquentTagRepository(new Tag());

                if (! Config::get('app.cache')) {
                    return $repository;
                }

                return new CacheTagDecorator($repository);
            }
        );
    }
}
