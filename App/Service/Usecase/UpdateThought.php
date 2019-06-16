<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\UpdateThoughtInput;
use App\Service\UsecaseOutput\UpdateThoughtOutput;

interface UpdateThought {

    public function __construct(UpdateThoughtInput $input);

    public function execute(): UpdateThoughtOutput;
}