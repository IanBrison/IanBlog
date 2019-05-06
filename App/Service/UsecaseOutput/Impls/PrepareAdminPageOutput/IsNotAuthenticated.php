<?php

namespace App\Service\UsecaseOutput\Impls\PrepareAdminPageOutput;

use App\Model\Read\Article;
use App\Service\UsecaseOutput\PrepareAdminPageOutput;
use App\System\Exception\UncallableException;

class IsNotAuthenticated implements PrepareAdminPageOutput {

	public function isAuthenticated(): bool {
		return false;
	}

	/**
	 * @return Article[]
	 * @throws UncallableException
	 */
	public function getArticles(): array {
		throw new UncallableException();
	}
}