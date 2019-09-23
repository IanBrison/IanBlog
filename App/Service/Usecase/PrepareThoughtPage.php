<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\PrepareThoughtPageInput;
use App\Service\UsecaseOutput\PrepareThoughtPageOutput;

interface PrepareThoughtPage {

    public function execute(PrepareThoughtPageInput $input): PrepareThoughtPageOutput;
}