<?php

namespace App\Service\Usecase\Impls;

use App\Service\Repository\Read\AuthRepository;
use App\Service\Usecase\PrepareLoginPage;
use App\Service\UsecaseOutput\Impls\PrepareLoginPageOutput\LoginStatus;
use App\Service\UsecaseOutput\PrepareLoginPageOutput;

class PrepareLoginPageUsecase implements PrepareLoginPage {

    private $authRepository;

    public function __construct(AuthRepository $authRepository) {
        $this->authRepository = $authRepository;
    }

    public function execute(): PrepareLoginPageOutput {
		if ($this->authRepository->isAuthenticated()) {
			return new LoginStatus(true);
		}
		return new LoginStatus(false);
	}
}