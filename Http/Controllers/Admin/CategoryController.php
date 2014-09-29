<?php namespace Modules\Blog\Http\Controllers\Admin;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Laracasts\Flash\Flash;
use Modules\Blog\Http\Requests\StoreCategoryRequest;
use Modules\Blog\Http\Requests\UpdateCategoryRequest;
use Modules\Blog\Repositories\CategoryRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CategoryController extends AdminBaseController
{
    /**
     * @var CategoryRepository
     */
    private $category;

    public function __construct(CategoryRepository $category)
    {
        parent::__construct();

        $this->beforeFilter('permissions');

        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = $this->category->all();

        return View::make('blog::admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('blog::admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @return Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->category->create($request->all());

        Flash::success('Category created');
        return Redirect::route('dashboard.category.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->category->find($id);

        return View::make('blog::admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param UpdateCategoryRequest $request
     * @return Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $this->category->update($id, $request->all());

        Flash::success('Category updated');
        return Redirect::route('dashboard.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    private function separateLanguages($data)
    {
        $cleanedData = [];
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $lang => $input) {
                    $cleanedData[$lang][$key] = $input;
                }
            } else {
                $cleanedData[$key] = $value;
            }
        }
        return $cleanedData;
    }
}