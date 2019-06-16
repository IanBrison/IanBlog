<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\CreateDraftInput;
use App\Service\UsecaseOutput\CreateDraftOutput;

interface CreateDraft {

    public function __construct(CreateDraftInput $input);

    public function execute(): CreateDraftOutput;
}