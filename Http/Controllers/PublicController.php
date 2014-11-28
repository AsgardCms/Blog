<?php namespace Modules\Blog\Http\Controllers;

use Modules\Blog\Repositories\PostRepository;
use Modules\Core\Http\Controllers\BasePublicController;

class PublicController extends BasePublicController
{
    /**
     * @var PostRepository
     */
    private $post;

    public function __construct(PostRepository $post)
    {
        parent::__construct();
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->all();

        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        dd('showing blog post: '. $slug);
    }
}
