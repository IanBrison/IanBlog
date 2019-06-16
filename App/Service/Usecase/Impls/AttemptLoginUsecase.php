<?php

namespace App\Service\Usecase\Impls;

use App\Service\Repository\Read\AuthRepository;
use App\Service\Usecase\AttemptLogin;
use App\Service\UsecaseInput\AttemptLoginInput;
use App\Service\UsecaseOutput\AttemptLoginOutput;
use App\Service\UsecaseOutput\Impls\AttemptLoginOutput\AttemptResult;
use App\Service\DiContainer as Di;

class AttemptLoginUsecase implements AttemptLogin {

	private $input;

	public function __construct(AttemptLoginInput $input) {
		$this->input = $input;
	}

	public function execute(): AttemptLoginOutput {
		$password = $this->input->getPassword();
		if (!Di::get(AuthRepository::class)->attemptLogin($password)) {
			return new AttemptResult(false);
		}
		return new AttemptResult(true);
	}
}