<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\CreatePostInput;
use App\Service\UsecaseOutput\CreatePostOutput;

interface CreatePost {

    public function __construct(CreatePostInput $input);

    public function execute(): CreatePostOutput;
}