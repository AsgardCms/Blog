<?php

namespace Modules\Blog\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Category;
use Modules\Blog\Http\Requests\StoreCategoryRequest;
use Modules\Blog\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->all();

        return response()->json([
            'errors' => false,
            'count' => $categories->count(),
            'data' => $categories,
        ]);
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = $this->category->create($request->all());

        return response()->json([
            'errors' => false,
            'message' => trans('blog::messages.category created'),
            'data' => $category,
        ], Response::HTTP_CREATED);
    }

    public function update(Category $category, Request $request)
    {
        $category = $this->category->update($category, $request->all());

        return response()->json([
            'errors' => false,
            'message' => trans('blog::messages.category updated'),
            'data' => $category,
        ], Response::HTTP_CREATED);
    }

    public function destroy(Category $category)
    {
        $this->category->destroy($category);

        return response()->json([
            'errors' => false,
            'message' => trans('blog::messages.category deleted'),
        ], Response::HTTP_ACCEPTED);
    }
}
