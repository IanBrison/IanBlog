<?php

namespace App\Service\UsecaseOutput\Impls\AttemptLoginOutput;

use App\Service\UsecaseOutput\AttemptLoginOutput;

class AttemptResult implements AttemptLoginOutput {

	private $result;

	public function __construct(bool $result) {
		$this->result = $result;
	}

	public function isNowLogin(): bool {
		return $this->result;
	}
}