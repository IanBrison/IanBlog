<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\CreatePostInput;
use App\Service\UsecaseOutput\CreatePostOutput;

interface CreatePost {

    public function execute(CreatePostInput $input): CreatePostOutput;
}