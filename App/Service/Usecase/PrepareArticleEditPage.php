<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\PrepareArticleEditPageInput;
use App\Service\UsecaseOutput\PrepareArticleEditPageOutput;

interface PrepareArticleEditPage {

    public function execute(PrepareArticleEditPageInput $input): PrepareArticleEditPageOutput;
}