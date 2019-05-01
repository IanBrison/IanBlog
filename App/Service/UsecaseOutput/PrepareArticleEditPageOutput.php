<?php

namespace App\Service\UsecaseOutput;

use App\Model\Read\Article;

interface PrepareArticleEditPageOutput {

	/**
	 * PrepareArticleEditPageOutput constructor.
	 * @param bool $isAuthenticated
	 * @param Article $article
	 */
	public function __construct(bool $isAuthenticated, ?Article $article = null);
}