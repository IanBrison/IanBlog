<?php

namespace App\Service\UsecaseOutput\Impls\PrepareArticleEditPageOutput;

use App\Model\Read\Article;
use App\Service\UsecaseOutput\PrepareArticleEditPageOutput;
use App\System\Exception\UncallableException;

class IsNotAuthenticated implements PrepareArticleEditPageOutput{

	public function isAuthenticated(): bool {
		return false;
	}

	/**
	 * @return Article
	 * @throws UncallableException
	 */
	public function getArticle(): Article {
		throw new UncallableException();
	}
}