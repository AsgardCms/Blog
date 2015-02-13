<?php

$router->resource('tag', 'TagController');
$router->get('tag/findByName/{name?}', ['as' => 'api.tag.findByName', 'uses' => 'TagController@findByName']);
