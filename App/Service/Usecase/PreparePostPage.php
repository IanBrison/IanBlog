<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\PreparePostPageInput;
use App\Service\UsecaseOutput\PreparePostPageOutput;

interface PreparePostPage {

    public function execute(PreparePostPageInput $input): PreparePostPageOutput;
}