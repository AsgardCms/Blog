<?php namespace Modules\Blog\Repositories\Eloquent;

use Illuminate\Support\Facades\App;
use Modules\Blog\Repositories\TagRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentTagRepository extends EloquentBaseRepository implements TagRepository
{
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
        $tags = $this->model->with('translations')->whereHas('translations', function($q) use($name)
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
        $data = [
            $lang => [
                'name' => $name
            ]
        ];

        return $this->create($data);
    }
}
