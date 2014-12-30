<?php namespace Modules\Blog\Tests;

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
}
