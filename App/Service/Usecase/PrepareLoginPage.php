<?php

namespace App\Service\Usecase;

use App\Service\Repository\Read\AuthRepository;
use App\Service\UsecaseOutput\PrepareLoginPageOutput;
use Core\Di\DiContainer as Di;

class PrepareLoginPage {

	public function execute(): PrepareLoginPageOutput {
		if (Di::get(AuthRepository::class)->isAuthenticated()) {
			return Di::get(PrepareLoginPageOutput::class, true);
		}
		return Di::get(PrepareLoginPageOutput::class, false);
	}
}