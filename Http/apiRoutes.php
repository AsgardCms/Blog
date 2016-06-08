<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->resource('tag', 'TagController');
$router->get('tag/findByName/{name?}', ['as' => 'api.tag.findByName', 'uses' => 'TagController@findByName']);
