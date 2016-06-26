<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->post('tag', [
    'as' => 'api.tag.store',
    'uses' => 'TagController@store'
]);
$router->get('tag/findByName/{name?}', [
    'as' => 'api.tag.findByName',
    'uses' => 'TagController@findByName',
]);
