<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\AttemptLoginInput;
use App\Service\UsecaseOutput\AttemptLoginOutput;

interface AttemptLogin {

    public function execute(AttemptLoginInput $input): AttemptLoginOutput;
}