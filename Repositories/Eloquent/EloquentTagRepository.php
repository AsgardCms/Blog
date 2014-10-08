<?php namespace Modules\Blog\Repositories\Eloquent;

use Illuminate\Support\Facades\App;
use Modules\Blog\Entities\Tag;
use Modules\Blog\Repositories\TagRepository;

class EloquentTagRepository implements TagRepository
{
    /**
     * Create a tag
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        // TODO: Implement create() method.
    }

    /**
     * Find a tag by id
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        // TODO: Implement find() method.
    }

    /**
     * Find all tags
     * @return mixed
     */
    public function all()
    {
        return Tag::all();
    }

    /**
     * Update a tag by its ID
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param string $slug
     * @return mixed
     */
    public function findBySlug($slug)
    {
    }

    /**
     * Find a tag by its name
     * @param $name
     * @return mixed
     */
    public function findByName($name)
    {
        $tags = Tag::with('translations')->whereHas('translations', function($q) use($name)
        {
            $q->where('name', 'like', "%$name%");
        })->get();

        return $this->setLocaleAsKey($tags);
    }

    private function setLocaleAsKey($tags)
    {
        $cleanedTags = [];
        foreach ($tags as $tag) {
            foreach ($tag->translations as $tagTranslation) {
                if (App::getLocale() == $tagTranslation->locale) {
                    $cleanedTags[] = [
                        'id' => $tag->id,
                        'name' => $tagTranslation->name
                    ];
                }
            }
        }

        return $cleanedTags;
    }

    /**
     * Create the tag for the specified language
     * @param string $lang
     * @param array $name
     * @return mixed
     */
    public function createForLanguage($lang = 'en', $name)
    {
        $tag = new Tag;
        $tag->translate($lang)->name = $name;
        $tag->save();

        return $tag;
    }
}