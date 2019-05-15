<?php

namespace App\Infrastructure\InputConverter;

use App\Service\UsecaseInput\AttemptLoginInput as AttemptLoginInputInterface;
use Core\Request\Request;

class AttemptLoginInput implements AttemptLoginInputInterface {

	const PASSWORD_INPUT_KEY = 'password';

	/** @var string */
	private $password;

	public function __construct(Request $request) {
		$this->password = $request->getPost(self::PASSWORD_INPUT_KEY, '');
	}

	public function getPassword(): string {
		return $this->password;
	}
}