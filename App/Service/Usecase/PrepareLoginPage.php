<?php

namespace App\Service\Usecase;

use App\Service\Repository\Read\AuthRepository;
use App\Service\UsecaseOutput\Impls\PrepareLoginPageOutput\LoginStatus;
use App\Service\UsecaseOutput\PrepareLoginPageOutput;
use Core\Di\DiContainer as Di;

class PrepareLoginPage {

	public function execute(): PrepareLoginPageOutput {
		if (Di::get(AuthRepository::class)->isAuthenticated()) {
			return new LoginStatus(true);
		}
		return new LoginStatus(false);
	}
}