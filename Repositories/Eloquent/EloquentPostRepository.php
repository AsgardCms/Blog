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
        $post = $this->find($id);
        $post->tags()->sync($data['tags']);

        unset($data['tags']);
        $translatableData = Helper::separateLanguages($data);
        Helper::saveTranslated($post, $translatableData);

        return $post;
    }

    /**
     * Create a blog post
     * @param array $data
     * @return Post
     */
    public function create($data)
    {
        $post = new Post;
        $post->category_id = $data['category'];
        $post->save();
        $post->tags()->sync($data['tags']);

        unset($data['tags']);
        $translatableData = Helper::separateLanguages($data);
        Helper::saveTranslated($post, $translatableData);

        return $post;
    }
}