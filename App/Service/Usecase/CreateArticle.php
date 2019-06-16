<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\CreateArticleInput;
use App\Service\UsecaseOutput\CreateArticleOutput;

interface CreateArticle {

    public function __construct(CreateArticleInput $input);

    public function execute(): CreateArticleOutput;
}