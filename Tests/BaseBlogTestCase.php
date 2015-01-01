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

    /**
     * @var \Modules\Blog\Repositories\TagRepository
     */
    protected $tag;

    public function setUp()
    {
        parent::setUp();

        /** @var \Illuminate\Console\Application $artisan */
        $artisan = $this->app->make('Illuminate\Console\Application');
        $artisan->call('module:migrate', ['module' => 'Blog']);

        $this->post = app('Modules\Blog\Repositories\PostRepository');
        $this->tag = app('Modules\Blog\Repositories\TagRepository');
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
        ];

        return $this->post->create($data);
    }

    public function createTag()
    {
        $faker = Factory::create();

        $enName = $faker->word;
        $enSlug = Str::slug($enName);

        $frName = $faker->word;
        $frSlug = Str::slug($enName);

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
}
