<?php namespace Modules\Blog\Tests;

use Illuminate\Support\Facades\App;

class EloquentTagRepositoryTest extends BaseBlogTestCase
{
    /** @test */
    public function it_finds_a_tag_by_name()
    {
        // Prepare
        $this->createTag();
        $this->createTag();
        $tag = $this->createTag();

        // Assert
        $foundTag = $this->tag->findByName($tag->name);
        $this->assertEquals($tag->translate('en')->name, $foundTag[0]['name']);

        App::setLocale('fr');
        $foundTag = $this->tag->findByName($tag->name);
        $this->assertEquals($tag->translate('fr')->name, $foundTag[0]['name']);
    }
}
