<?php

namespace App\Service\Usecase\Impls;

use App\Service\Repository\Read\ArticleRepository;
use App\Service\Repository\Read\AuthRepository;
use App\Service\Usecase\PrepareAdminPage;
use App\Service\UsecaseOutput\Impls\PrepareAdminPageOutput\AdminPageInfo;
use App\Service\UsecaseOutput\Impls\PrepareAdminPageOutput\IsNotAuthenticated;
use App\Service\UsecaseOutput\PrepareAdminPageOutput;

class PrepareAdminPageUsecase implements PrepareAdminPage {

    private $authRepository;
    private $articleRepository;

    public function __construct(AuthRepository $authRepository, ArticleRepository $articleRepository) {
        $this->authRepository = $authRepository;
        $this->articleRepository = $articleRepository;
    }

    public function execute(): PrepareAdminPageOutput {
		if (!$this->authRepository->isAuthenticated()) {
			return new IsNotAuthenticated();
		}

		$articles = $this->articleRepository->getAll();
		return new AdminPageInfo($articles);
	}
}