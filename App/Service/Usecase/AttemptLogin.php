<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\AttemptLoginInput;
use App\Service\UsecaseOutput\AttemptLoginOutput;

interface AttemptLogin {

    public function __construct(AttemptLoginInput $input);

    public function execute(): AttemptLoginOutput;
}