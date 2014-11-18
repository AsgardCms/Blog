<?php namespace Modules\Blog\Http\Controllers;

class PublicController
{
    public function index()
    {
        dd('hello blog index');
    }

    public function show($slug)
    {
        dd('showing blog post: '. $slug);
    }
}
