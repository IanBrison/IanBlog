<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\CreateThoughtInput;
use App\Service\UsecaseOutput\CreateThoughtOutput;

interface CreateThought {

    public function __construct(CreateThoughtInput $input);

    public function execute(): CreateThoughtOutput;
}