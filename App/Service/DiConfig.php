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
        App\Service\Usecase\AttemptLogin::class => App\Service\Usecase\Impls\AttemptLoginUsecase::class,
        App\Service\Usecase\CreateArticle::class => App\Service\Usecase\Impls\CreateArticleUsecase::class,
        App\Service\Usecase\CreateDraft::class => App\Service\Usecase\Impls\CreateDraftUsecase::class,
        App\Service\Usecase\CreatePost::class => App\Service\Usecase\Impls\CreatePostUsecase::class,
        App\Service\Usecase\CreateThought::class => App\Service\Usecase\Impls\CreateThoughtUsecase::class,
        App\Service\Usecase\PrepareAdminPage::class => App\Service\Usecase\Impls\PrepareAdminPageUsecase::class,
        App\Service\Usecase\PrepareArticleEditPage::class => App\Service\Usecase\Impls\PrepareArticleEditPageUsecase::class,
        App\Service\Usecase\PrepareImagesPage::class => App\Service\Usecase\Impls\PrepareImagesPageUsecase::class,
        App\Service\Usecase\PrepareLoginPage::class => App\Service\Usecase\Impls\PrepareLoginPageUsecase::class,
        App\Service\Usecase\PreparePostPage::class => App\Service\Usecase\Impls\PreparePostPageUsecase::class,
        App\Service\Usecase\PreparePostsPage::class => App\Service\Usecase\Impls\PreparePostsPageUsecase::class,
        App\Service\Usecase\PrepareThoughtPage::class => App\Service\Usecase\Impls\PrepareThoughtPageUsecase::class,
        App\Service\Usecase\PrepareThoughtsPage::class => App\Service\Usecase\Impls\PrepareThoughtsPageUsecase::class,
        App\Service\Usecase\UpdateDraft::class => App\Service\Usecase\Impls\UpdateDraftUsecase::class,
        App\Service\Usecase\UpdatePost::class => App\Service\Usecase\Impls\UpdatePostUsecase::class,
        App\Service\Usecase\UpdateThought::class => App\Service\Usecase\Impls\UpdateThoughtUsecase::class,

        App\Service\Repository\Read\AuthRepository::class => App\Infrastructure\Repository\Query\AuthQuery::class,
        App\Service\Repository\Read\ArticleRepository::class => App\Infrastructure\Repository\Query\Mocks\ArticleQuery::class,
    ]
];
