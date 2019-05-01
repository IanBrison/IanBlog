<?php

namespace App\Service\UsecaseInput;

interface CreatePostInput {

	public function getTitleInput(): string;

	public function getContentInput(): string;
}