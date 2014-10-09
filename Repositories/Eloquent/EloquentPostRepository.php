<?php namespace Modules\Blog\Repositories\Eloquent;

use Illuminate\Support\Collection;
use Modules\Blog\Entities\Post;
use Modules\Blog\Repositories\PostRepository;
use Modules\Core\Internationalisation\Helper;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentPostRepository extends EloquentBaseRepository implements PostRepository
{
    /**
     * Update a resource
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
    }

    public function create($data)
    {
        $translatableData = Helper::separateLanguages($data);

        $post = new Post;
        $post->category_id = $data['category'];
        $post->save();
        $post->tags()->sync(explode(',', $data['tags']));
        Helper::saveTranslated($post, $translatableData);

        return $post;
    }
}