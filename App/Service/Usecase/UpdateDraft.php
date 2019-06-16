<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\UpdateDraftInput;
use App\Service\UsecaseOutput\UpdateDraftOutput;

interface UpdateDraft {

    public function __construct(UpdateDraftInput $input);

    public function execute(): UpdateDraftOutput;
}