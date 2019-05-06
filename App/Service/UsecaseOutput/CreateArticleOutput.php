<?php

namespace App\Service\UsecaseOutput;

use App\Model\Read\Article;

interface CreateArticleOutput {

	public function __construct(int $errorCode, ?Article $article = null);
}