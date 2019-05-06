<?php

namespace App\Service\UsecaseOutput\Impls\PrepareAdminPage;

use App\Model\Read\Article;
use App\Service\UsecaseOutput\PrepareAdminPageOutput;

class AdminPageInfo implements PrepareAdminPageOutput {

	private $articles;

	/**
	 * AdminPageOutput constructor.
	 * @param Article[] $articles
	 */
	public function __construct(array $articles) {
		$this->articles = $articles;
	}

	public function isAuthenticated(): bool {
		return true;
	}

	/**
	 * @return Article[]
	 */
	public function getArticles(): array {
		return $this->articles;
	}
}