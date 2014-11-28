<?php namespace Modules\Blog\Http\Controllers;

use Modules\Core\Http\Controllers\BasePublicController;

class PublicController extends BasePublicController
{
    public function index()
    {
        return view('index');
    }

    public function show($slug)
    {
        dd('showing blog post: '. $slug);
    }
}
