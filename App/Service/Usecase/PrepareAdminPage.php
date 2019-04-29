<?php

namespace App\Service\Usecase;

use App\Service\Repository\Read\ArticleRepository;
use App\Service\Repository\Read\AuthRepository;
use App\Service\UsecaseInput\PrepareAdminPageInput;
use App\Service\UsecaseOutput\PrepareAdminPageOutput;
use Core\Di\DiContainer as Di;

class PrepareAdminPage {

	private $input;

	public function __construct(PrepareAdminPageInput $input) {
		$this->input = $input;
	}

	public function execute(): PrepareAdminPageOutput {
		if (!Di::get(AuthRepository::class)->isAuthenticated()) {
			return Di::get(PrepareAdminPageOutput::class, false);
		}

		$articles = Di::get(ArticleRepository::class)->getAll();
		return Di::get(PrepareAdminPageOutput::class, true, $articles);
	}
}