<?php namespace Modules\Blog\Tests;

class EloquentTagRepositoryTest extends BaseBlogTestCase
{
    /** @test */
    public function it_finds_a_tag_by_name()
    {
        // Prepare
        $this->createTag();
        $this->createTag();
        $tag = $this->createTag();

        // Run
        $foundTag = $this->tag->findByName($tag->name);

        // Assert
        $this->assertEquals($tag->name, $foundTag[0]['name']);
    }
}
