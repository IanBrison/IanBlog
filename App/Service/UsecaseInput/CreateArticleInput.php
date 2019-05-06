<?php

namespace App\Service\UsecaseInput;

interface CreateArticleInput {

	public function getTitleInput(): string;

	public function getContentInput(): string;

	public function getKeyInput(): string;

	public function isToPublish(): bool;

	public function isToBePost(): bool;
}