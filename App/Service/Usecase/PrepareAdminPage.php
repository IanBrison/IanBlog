<?php

namespace App\Service\Usecase;

use App\Model\Read\Article;
use App\Service\Repository\Read\ArticleRepository;
use App\Service\Repository\Read\AuthRepository;
use App\Service\UsecaseOutput\PrepareAdminPageOutput;
use App\System\Exception\UncallableException;
use Core\Di\DiContainer as Di;

class PrepareAdminPage {

	public function execute(): PrepareAdminPageOutput {
		if (!Di::get(AuthRepository::class)->isAuthenticated()) {
			return new IsNotAuthenticated();
		}

		$articles = Di::get(ArticleRepository::class)->getAll();
		return new AdminPageInfo($articles);
	}
}

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