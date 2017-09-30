<?php

namespace Modules\Blog\Tests;

use Illuminate\Support\Facades\Event;
use Modules\Blog\Entities\Status;
use Modules\Blog\Events\PostContentIsRendering;

class PostContentIsRenderingTest extends BaseBlogTestCase
{
    /** @test */
    public function it_can_change_final_content()
    {
        Event::listen(PostContentIsRendering::class, function (PostContentIsRendering $event) {
            $event->setContent('<strong>' . $event->getOriginal() . '</strong>');
        });

        $post = $this->post->create([
            'en' => ['title' => 'lorem en', 'slug' => 'something', 'content' => 'My Post Body'],
            'fr' => ['title' => 'lorem fr', 'slug' => 'quelque-chose', 'content' => 'My Post Body'],
            'category_id' => 1,
            'status' => Status::PUBLISHED,
            'tags' => [],
        ]);

        $this->assertEquals('<strong>My Post Body</strong>', $post->content);
    }

    /** @test */
    public function it_doesnt_alter_content_if_no_listeners()
    {
        $post = $this->post->create([
            'en' => ['title' => 'lorem en', 'slug' => 'something', 'content' => 'My Post Body'],
            'fr' => ['title' => 'lorem fr', 'slug' => 'quelque-chose', 'content' => 'My Post Body'],
            'category_id' => 1,
            'status' => Status::PUBLISHED,
            'tags' => [],
        ]);

        $this->assertEquals('My Post Body', $post->content);
    }
}
