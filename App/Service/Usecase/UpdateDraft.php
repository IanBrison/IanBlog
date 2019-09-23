<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\UpdateDraftInput;
use App\Service\UsecaseOutput\UpdateDraftOutput;

interface UpdateDraft {

    public function execute(UpdateDraftInput $input): UpdateDraftOutput;
}