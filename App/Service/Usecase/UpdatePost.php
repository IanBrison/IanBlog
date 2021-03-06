<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\UpdatePostInput;
use App\Service\UsecaseOutput\UpdatePostOutput;

interface UpdatePost {

    public function execute(UpdatePostInput $input): UpdatePostOutput;
}