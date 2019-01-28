<?php

$router->get('/welcome', [
    'as'   => 'get_main_home_page',
    'uses' => 'Controller@sayWelcome',
]);
