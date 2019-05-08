<?php

namespace App\Service\UsecaseOutput;

use App\Model\Read\Article;

interface CreateArticleOutput {

	const INPUT_ERROR = 1;
	const SAVING_ERROR = 2;

	public function hasError(): bool;

	public function getErrorCode(): int;

	public function getArticle(): Article;
}