<?php

/*
 * config file for the di container
 *
 * singletons are instances that are to be saved when they are constructed
 * aliases are for choosing the right classes to use for construction
 */
return [
    'singletons' => [
    ],

    'aliases' => [
        App\Service\Repository\Read\AuthRepository::class => App\Infrastructure\Repository\Query\AuthQuery::class,
        App\Service\Repository\Read\ArticleRepository::class => App\Infrastructure\Repository\Query\Mocks\ArticleQuery::class,
    ]
];
