<?php

namespace App\Service\UsecaseOutput;

use App\Model\Read\Article;

interface PrepareAdminPageOutput {

	/**
	 * PrepareAdminPageOutput constructor.
	 * @param bool $isAuthenticated
	 * @param Article[] $articles
	 */
	public function __construct(bool $isAuthenticated, array $articles = []);
}