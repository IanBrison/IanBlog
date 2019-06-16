<?php

namespace App\Service\Usecase\Impls;

use App\Service\Repository\Read\AuthRepository;
use App\Service\Usecase\PrepareLoginPage;
use App\Service\UsecaseOutput\Impls\PrepareLoginPageOutput\LoginStatus;
use App\Service\UsecaseOutput\PrepareLoginPageOutput;
use App\Service\DiContainer as Di;

class PrepareLoginPageUsecase implements PrepareLoginPage {

	public function execute(): PrepareLoginPageOutput {
		if (Di::get(AuthRepository::class)->isAuthenticated()) {
			return new LoginStatus(true);
		}
		return new LoginStatus(false);
	}
}