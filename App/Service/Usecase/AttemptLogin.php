<?php

namespace App\Service\Usecase;

use App\Service\Repository\Read\AuthRepository;
use App\Service\UsecaseInput\AttemptLoginInput;
use App\Service\UsecaseOutput\AttemptLoginOutput;
use Core\Di\DiContainer as Di;

class AttemptLogin {

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

class AttemptResult implements AttemptLoginOutput {

	private $result;

	public function __construct(bool $result) {
		$this->result = $result;
	}

	public function isNowLogin(): bool {
		return $this->result;
	}
}