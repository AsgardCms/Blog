<?php

namespace Modules\Blog\Tests;

use Modules\Blog\Entities\Status;

class EloquentPostRepositoryTest extends BaseBlogTestCase
{
    /** @test */
    public function it_should_only_returns_translated_posts()
    {
        // Prepare
        $this->createBlogPost();
        $this->createBlogPost();
        $data = [
            'en' => [
                'title' => 'One language title',
                'slug' => 'slug',
                'content' => 'lorem ipsum',
            ],
            'category_id' => 1,
            'status' => Status::PUBLISHED,
        ];
        $this->post->create($data);

        // Assert
        $englishPosts = $this->post->allTranslatedIn('en');
        $this->assertEquals(3, $englishPosts->count());
        $frenchPosts = $this->post->allTranslatedIn('fr');
        $this->assertEquals(2, $frenchPosts->count());
    }
}
