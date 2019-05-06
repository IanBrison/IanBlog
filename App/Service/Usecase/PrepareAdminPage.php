<?php

namespace App\Service\Usecase;

use App\Service\Repository\Read\ArticleRepository;
use App\Service\Repository\Read\AuthRepository;
use App\Service\UsecaseOutput\Impls\PrepareAdminPageOutput\AdminPageInfo;
use App\Service\UsecaseOutput\Impls\PrepareAdminPageOutput\IsNotAuthenticated;
use App\Service\UsecaseOutput\PrepareAdminPageOutput;
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