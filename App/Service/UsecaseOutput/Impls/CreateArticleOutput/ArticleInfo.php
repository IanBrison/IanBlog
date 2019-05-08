<?php

namespace App\Service\UsecaseOutput\Impls\CreateArticleOutput;

use App\Model\Read\Article;
use App\Service\UsecaseOutput\CreateArticleOutput;
use App\System\Exception\UncallableException;

class ArticleInfo implements CreateArticleOutput {

	private $article;

	public function __construct(Article $article) {
		$this->article = $article;
	}

	public function hasError(): bool {
		return false;
	}

	/**
	 * @return int
	 * @throws UncallableException
	 */
	public function getErrorCode(): int {
		throw new UncallableException();
	}

	public function getArticle(): Article {
		return $this->article;
	}
}