<?php namespace Modules\Blog\Tests;

use Faker\Factory;
use Illuminate\Support\Str;
use Modules\Core\Tests\BaseTestCase;

abstract class BaseBlogTestCase extends BaseTestCase
{
    /**
     * @var \Modules\Blog\Repositories\PostRepository
     */
    protected $post;

    public function setUp()
    {
        parent::setUp();

        /** @var \Illuminate\Console\Application $artisan */
        $artisan = $this->app->make('Illuminate\Console\Application');
        $artisan->call('module:migrate', ['module' => 'Blog']);

        $this->post = app('Modules\Blog\Repositories\PostRepository');
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
                'content' => $faker->paragraph()
            ],
            'fr' => [
                'title' => $title,
                'slug' => $slug,
                'content' => $faker->paragraph()
            ],
            'category_id' => 1
        ];

        return $this->post->create($data);
    }
}
