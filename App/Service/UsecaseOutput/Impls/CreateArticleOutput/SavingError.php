<?php

namespace App\Service\UsecaseOutput\Impls\CreateArticleOutput;

use App\Model\Read\Article;
use App\Service\UsecaseOutput\CreateArticleOutput;
use App\System\Exception\UncallableException;

class SavingError implements CreateArticleOutput {

	public function hasError(): bool {
		return true;
	}

	public function getErrorCode(): int {
		return self::SAVING_ERROR;
	}

	/**
	 * @return Article
	 * @throws UncallableException
	 */
	public function getArticle(): Article {
		throw new UncallableException();
	}
}