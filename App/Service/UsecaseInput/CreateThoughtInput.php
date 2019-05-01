<?php

namespace App\Service\UsecaseInput;

interface CreateThoughtInput {

	public function getTitleInput(): string;

	public function getContentInput(): string;

	public function getKeyInput(): string;
}