<?php

namespace App\Service\UsecaseInput;

interface UpdateDraftInput {

    public function getDraftId(): int;

    public function getTitleInput(): string;

    public function getContentInput(): string;
}