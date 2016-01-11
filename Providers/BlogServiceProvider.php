<?php namespace Modules\Blog\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Post;
use Modules\Blog\Entities\Tag;
use Modules\Blog\Repositories\Cache\CacheCategoryDecorator;
use Modules\Blog\Repositories\Cache\CachePostDecorator;
use Modules\Blog\Repositories\Cache\CacheTagDecorator;
use Modules\Blog\Repositories\CategoryRepository;
use Modules\Blog\Repositories\Eloquent\EloquentCategoryRepository;
use Modules\Blog\Repositories\Eloquent\EloquentPostRepository;
use Modules\Blog\Repositories\Eloquent\EloquentTagRepository;
use Modules\Blog\Repositories\PostRepository;
use Modules\Blog\Repositories\TagRepository;

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
        $this->app->bind(PostRepository::class, function () {
                $repository = new EloquentPostRepository(new Post());

                if (config('app.cache') === false) {
                    return $repository;
                }

                return new CachePostDecorator($repository);
            }
        );

        $this->app->bind(CategoryRepository::class, function () {
                $repository = new EloquentCategoryRepository(new Category());

                if (config('app.cache') === false) {
                    return $repository;
                }

                return new CacheCategoryDecorator($repository);
            }
        );

        $this->app->bind(TagRepository::class, function () {
                $repository = new EloquentTagRepository(new Tag());

                if (config('app.cache') === false) {
                    return $repository;
                }

                return new CacheTagDecorator($repository);
            }
        );
    }
}
