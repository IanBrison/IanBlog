<?php

use Core\Routing\Router;

return [
    Router::get('/', 'TopController', 'getTopPage'),
	Router::get('/login', 'LoginPageController', 'getLoginPage'),
	Router::post('/login', 'LoginAttemptController', 'attemptLogin'),
    Router::get('/admin', 'AdminPageController', 'getAdminPage'),
];
