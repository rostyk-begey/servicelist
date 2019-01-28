<?php

/** @var Route $router */
$router->get('categories/edit', [
    'as' => 'web_category_edit',
    'uses'  => 'Controller@edit',
    /*'middleware' => [
      'auth:web',
    ],*/
]);
