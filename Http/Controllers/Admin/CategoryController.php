<?php namespace Modules\Blog\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CategoryController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->beforeFilter('permissions');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('blog::admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return \View::make('blog::admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return \View::make('blog::admin.category.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        return \View::make('blog::admin.category.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
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
}