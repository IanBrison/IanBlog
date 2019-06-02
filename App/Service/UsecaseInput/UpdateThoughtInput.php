<?php

namespace App\Service\UsecaseInput;

interface UpdateThoughtInput {

    public function getThoughtId(): int;

    public function getTitleInput(): string;

    public function getContentInput(): string;

	public function getKeyInput(): string;
}