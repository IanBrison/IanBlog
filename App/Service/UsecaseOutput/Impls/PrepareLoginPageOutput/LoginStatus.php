<?php

namespace App\Service\UsecaseOutput\Impls\PrepareLoginPageOutput;

use App\Service\UsecaseOutput\PrepareLoginPageOutput;

class LoginStatus implements PrepareLoginPageOutput {

	private $isLogin;

	public function __construct(bool $isLogin) {
		$this->isLogin = $isLogin;
	}

	public function isAlreadyLogin(): bool {
		return $this->isLogin;
	}
}