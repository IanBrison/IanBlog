<?php

namespace App\Service\Usecase;

use App\Service\Repository\Read\AuthRepository;
use App\Service\UsecaseInput\PrepareLoginPageInput;
use App\Service\UsecaseOutput\PrepareLoginPageOutput;
use Core\Di\DiContainer as Di;

class PrepareLoginPage {

	private $input;

	public function __construct(PrepareLoginPageInput $input) {
		$this->input = $input;
	}

	public function execute(): PrepareLoginPageOutput {
		if (Di::get(AuthRepository::class)->isAuthenticated()) {
			return Di::get(PrepareLoginPageOutput::class, true);
		}
		return Di::get(PrepareLoginPageOutput::class, false);
	}
}