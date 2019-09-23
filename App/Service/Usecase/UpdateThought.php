<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\UpdateThoughtInput;
use App\Service\UsecaseOutput\UpdateThoughtOutput;

interface UpdateThought {

    public function execute(UpdateThoughtInput $input): UpdateThoughtOutput;
}