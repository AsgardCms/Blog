<?php namespace Modules\Blog\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Response;
use Modules\Blog\Http\Requests\CreateTagRequest;
use Modules\Blog\Repositories\TagRepository;

class TagController extends Controller
{
    /**
     * @var TagRepository
     */
    private $tag;

    public function __construct(TagRepository $tag)
    {
        $this->tag = $tag;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->tag->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return \View::make('collection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTagRequest $request
     * @return Response
     */
    public function store(CreateTagRequest $request)
    {
        $tag = $this->tag->createForLanguage(App::getLocale(), $request->name);

        return Response::json($tag);
    }

    /**
     * Find the resource by name
     *
     * @param $name
     * @return Response
     */
    public function findByName($name)
    {
        return Response::json($this->tag->findByName($name));
    }
}
