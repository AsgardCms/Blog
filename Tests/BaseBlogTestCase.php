<?php

namespace Modules\Blog\Tests;

use Faker\Factory;
use Illuminate\Support\Str;
use Maatwebsite\Sidebar\SidebarServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Mcamara\LaravelLocalization\LaravelLocalizationServiceProvider;
use Modules\Blog\Entities\Status;
use Modules\Blog\Providers\BlogServiceProvider;
use Modules\Core\Providers\CoreServiceProvider;
use Modules\Media\Image\ImageServiceProvider;
use Modules\Media\Providers\MediaServiceProvider;
use Modules\Tag\Providers\TagServiceProvider;
use Nwidart\Modules\LaravelModulesServiceProvider;
use Orchestra\Testbench\TestCase;

abstract class BaseBlogTestCase extends TestCase
{
    /**
     * @var \Modules\Blog\Repositories\PostRepository
     */
    protected $post;

    /**
     * @var \Modules\Blog\Repositories\TagRepository
     */
    protected $tag;

    public function setUp()
    {
        parent::setUp();

        $this->resetDatabase();

        $this->post = app('Modules\Blog\Repositories\PostRepository');
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelModulesServiceProvider::class,
            LaravelLocalizationServiceProvider::class,
            CoreServiceProvider::class,
            ImageServiceProvider::class,
            TagServiceProvider::class,
            MediaServiceProvider::class,
            BlogServiceProvider::class,
            SidebarServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'LaravelLocalization' => LaravelLocalization::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['path.base'] = __DIR__ . '/..';
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', array(
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ));
        $app['config']->set('translatable.locales', ['en', 'fr']);
    }

    /**
     * Helper method to create a blog post
     * @return object
     */
    public function createBlogPost()
    {
        $faker = Factory::create();

        $title = implode(' ', $faker->words(3));
        $slug = Str::slug($title);

        $data = [
            'en' => [
                'title' => $title,
                'slug' => $slug,
                'content' => $faker->paragraph(),
            ],
            'fr' => [
                'title' => $title,
                'slug' => $slug,
                'content' => $faker->paragraph(),
            ],
            'category_id' => 1,
            'status' => Status::PUBLISHED,
            'tags' => [],
        ];

        return $this->post->create($data);
    }

    public function createTag()
    {
        $faker = Factory::create();

        $enName = $faker->word;
        $enSlug = Str::slug($enName);

        $frName = $faker->word;
        $frSlug = Str::slug($frName);

        $data = [
            'en' => [
                'name' => $enName,
                'slug' => $enSlug,
            ],
            'fr' => [
                'name' => $frName,
                'slug' => $frSlug,
            ],
        ];

        return $this->tag->create($data);
    }

    private function resetDatabase()
    {
        // Makes sure the migrations table is created
        $this->artisan('migrate', [
            '--database' => 'sqlite',
        ]);
        // We empty all tables
        $this->artisan('migrate:reset', [
            '--database' => 'sqlite',
        ]);
        // Migrate
        $this->artisan('migrate', [
            '--database' => 'sqlite',
        ]);
        $this->artisan('migrate', [
            '--database' => 'sqlite',
            '--path'     => 'Modules/Media/Database/Migrations',
        ]);
    }
}
