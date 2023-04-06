<?php

namespace Modules\Blog\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Blog\Entities\Post;
use Modules\Blog\Events\Handlers\RegisterBlogSidebar;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Traits\CanGetSidebarClassForModule;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Media\Image\ThumbnailManager;
use Modules\Tag\Repositories\TagManager;

class BlogServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration, CanGetSidebarClassForModule;
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

        $this->app['events']->listen(
            BuildingSidebar::class,
            $this->getSidebarClassForModule('blog', RegisterBlogSidebar::class)
        );
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../Resources/views' => base_path('resources/views/asgard/blog'),
        ]);

        $this->publishConfig('blog', 'config');
        $this->publishConfig('blog', 'permissions');
        $this->publishConfig('blog', 'settings');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->registerThumbnails();
        $this->app[TagManager::class]->registerNamespace(new Post());
        $this->registerViewComposers();
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
    }

    private function registerThumbnails()
    {
        $this->app[ThumbnailManager::class]->registerThumbnail('blogThumb', [
            'fit' => [
                'width' => '150',
                'height' => '150',
                'callback' => function ($constraint) {
                    $constraint->upsize();
                },
            ],
        ]);
    }

    private function registerViewComposers()
    {
        $this->app['view']->composer(
            config('asgard.blog.config.latest-posts', ['blog.*']),
            \Modules\Blog\Composers\Frontend\LatestPostsComposer::class
        );

        $this->app['view']->composer([
            'blog::admin.posts.create',
            'blog::admin.posts.edit',
        ], \Modules\Core\Composers\CurrentUserViewComposer::class);
    }
}
