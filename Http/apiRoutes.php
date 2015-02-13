<?php

$router->resource('tag', 'TagController');
$router->get('tag/findByName/{name}', 'TagController@findByName');
