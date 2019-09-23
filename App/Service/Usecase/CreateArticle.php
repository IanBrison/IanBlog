<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\CreateArticleInput;
use App\Service\UsecaseOutput\CreateArticleOutput;

interface CreateArticle {

    public function execute(CreateArticleInput $input): CreateArticleOutput;
}