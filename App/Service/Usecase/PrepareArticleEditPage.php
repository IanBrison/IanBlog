<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\PrepareArticleEditPageInput;
use App\Service\UsecaseOutput\PrepareArticleEditPageOutput;

interface PrepareArticleEditPage {

    public function __construct(PrepareArticleEditPageInput $input);

    public function execute(): PrepareArticleEditPageOutput;
}