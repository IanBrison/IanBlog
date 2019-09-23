<?php

namespace App\Service\Usecase\Impls;

use App\Service\Repository\Read\AuthRepository;
use App\Service\Usecase\AttemptLogin;
use App\Service\UsecaseInput\AttemptLoginInput;
use App\Service\UsecaseOutput\AttemptLoginOutput;
use App\Service\UsecaseOutput\Impls\AttemptLoginOutput\AttemptResult;

class AttemptLoginUsecase implements AttemptLogin {

	private $authRepository;

	public function __construct(AuthRepository $authRepository) {
		$this->authRepository = $authRepository;
	}

	public function execute(AttemptLoginInput $input): AttemptLoginOutput {
		$password = $input->getPassword();
		if (!$this->authRepository->attemptLogin($password)) {
			return new AttemptResult(false);
		}
		return new AttemptResult(true);
	}
}