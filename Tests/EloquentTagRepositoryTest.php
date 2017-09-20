<?php

namespace Modules\Blog\Tests;

use Faker\Factory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class EloquentTagRepositoryTest extends BaseBlogTestCase
{
    /** @test */
    public function it_finds_a_tag_by_name()
    {
        // Prepare
        $this->createCustomTag();
        $this->createCustomTag();
        $this->createCustomTag([
            'en' => ['name' => 'my tag'],
            'fr' => ['name' => 'mon tag'],
        ]);

        // Assert
        $foundTag = $this->tag->findByName('my tag');
        $this->assertEquals('my tag', $foundTag[0]['name']);

        App::setLocale('fr');
        $foundTag = $this->tag->findByName('mon tag');
        $this->assertEquals('mon tag', $foundTag[0]['name']);
    }

    private function createCustomTag(array $attributes = [])
    {
        $faker = Factory::create();
        $enName = $faker->word;
        $frName = $faker->word;

        $data = [
            'en' => [
                'name' => array_get($attributes, 'en.name', $enName),
                'slug' => Str::slug(array_get($attributes, 'en.name', $enName)),
            ],
            'fr' => [
                'name' => array_get($attributes, 'fr.name', $frName),
                'slug' => Str::slug(array_get($attributes, 'fr.name', $frName)),
            ],
        ];

        return $this->tag->create($data + $attributes);
    }
}
