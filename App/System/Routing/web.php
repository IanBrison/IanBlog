<?php

use Core\Routing\Router;

return [
    Router::get('/', 'TopController', 'getTopPage'),
	Router::get('/login', 'LoginPageController', 'getLoginPage'),
];
