<?php namespace Modules\Blog\Repositories\Eloquent;

use Modules\Blog\Entities\Post;
use Modules\Blog\Repositories\PostRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentPostRepository extends EloquentBaseRepository implements PostRepository
{
    /**
     * @param  int    $id
     * @return object
     */
    public function find($id)
    {
        return $this->model->with('translations', 'tags')->find($id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->model->with('translations', 'tags')->orderBy('created_at', 'DESC')->get();
    }

    /**
     * Update a resource
     * @param $post
     * @param  array $data
     * @return mixed
     */
    public function update($post, $data)
    {
        $post->update($data);

        if (isset($data['tags'])) {
            $post->tags()->sync($data['tags']);
        }

        return $post;
    }

    /**
     * Create a blog post
     * @param  array $data
     * @return Post
     */
    public function create($data)
    {
        $post = $this->model->create($data);

        if (isset($data['tags'])) {
            $post->tags()->sync($data['tags']);
        }

        return $post;
    }
}
