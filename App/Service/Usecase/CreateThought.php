<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\CreateThoughtInput;
use App\Service\UsecaseOutput\CreateThoughtOutput;

interface CreateThought {

    public function execute(CreateThoughtInput $input): CreateThoughtOutput;
}