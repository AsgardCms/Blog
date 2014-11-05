<?php namespace Modules\Blog\Repositories\Eloquent;

use Modules\Blog\Entities\Post;
use Modules\Blog\Repositories\PostRepository;
use Modules\Core\Internationalisation\Helper;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentPostRepository extends EloquentBaseRepository implements PostRepository
{
    /**
     * Update a resource
     * @param $post
     * @param array $data
     * @return mixed
     */
    public function update($post, $data)
    {
        $post->tags()->sync($data['tags']);

        unset($data['tags']);
        $translatableData = Helper::separateLanguages($data);
        Helper::updateTranslated($post, $translatableData);

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
        Helper::updateTranslated($post, $translatableData);

        return $post;
    }
}
