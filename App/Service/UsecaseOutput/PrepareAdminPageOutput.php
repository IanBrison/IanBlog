<?php

namespace App\Service\UsecaseOutput;

use App\Model\Read\Article;

interface PrepareAdminPageOutput {

	public function isAuthenticated(): bool;

	/**
	 * @return Article[]
	 */
	public function getArticles(): array;
}