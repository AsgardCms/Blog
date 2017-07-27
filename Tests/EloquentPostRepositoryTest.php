<?php

namespace Modules\Blog\Tests;

use Illuminate\Support\Facades\Event;
use Modules\Blog\Entities\Status;
use Modules\Blog\Events\PostIsCreating;
use Modules\Blog\Events\PostWasCreated;

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

    /** @test */
    public function it_triggers_event_when_post_was_created()
    {
        Event::fake();

        $post = $this->createBlogPost();

        Event::assertDispatched(PostWasCreated::class, function ($e) use ($post) {
            return $e->post->translate('en')->title === $post->translate('en')->title;
        });
    }

    /** @test */
    public function it_triggers_event_when_post_is_creating()
    {
        Event::fake();

        $post = $this->createBlogPost();

        Event::assertDispatched(PostIsCreating::class, function ($e) use ($post) {
            return $e->getAttribute('en.title') === $post->translate('en')->title;
        });
    }

    /** @test */
    public function it_can_change_data_when_it_is_creating_event()
    {
        Event::listen(PostIsCreating::class, function (PostIsCreating $event) {
            $event->setAttributes(['en' => ['title' => 'awesome title']]);
        });

        $post = $this->createBlogPost();

        $this->assertEquals('awesome title', $post->translate('en')->title);
    }
}
