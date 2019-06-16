<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\PreparePostPageInput;
use App\Service\UsecaseOutput\PreparePostPageOutput;

interface PreparePostPage {

    public function __construct(PreparePostPageInput $input);

    public function execute(): PreparePostPageOutput;
}