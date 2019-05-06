<?php

use Core\Routing\Router;

return [
    Router::get('/', 'TopController', 'getTopPage'),
];
