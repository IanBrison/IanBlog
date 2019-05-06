<?php

namespace App\Service\UsecaseOutput;

use App\Model\Read\Article;

interface PrepareArticleEditPageOutput {

	public function isAuthenticated(): bool;

	public function getArticle(): Article;
}