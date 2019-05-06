<?php

namespace App\Service\UsecaseOutput\Impls\PrepareArticleEditPageOutput;

use App\Model\Read\Article;
use App\Service\UsecaseOutput\PrepareArticleEditPageOutput;

class ArticleEditPageInfo implements PrepareArticleEditPageOutput {

	private $article;

	public function __construct(Article $article) {
		$this->article = $article;
	}

	public function isAuthenticated(): bool {
		return true;
	}

	public function getArticle(): Article {
		return $this->article;
	}
}