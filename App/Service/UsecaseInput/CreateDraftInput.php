<?php

namespace App\Service\UsecaseInput;

interface CreateDraftInput {

	public function getTitleInput(): string;

	public function getContentInput(): string;
}