<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\UpdatePostInput;
use App\Service\UsecaseOutput\UpdatePostOutput;

interface UpdatePost {

    public function __construct(UpdatePostInput $input);

    public function execute(): UpdatePostOutput;
}