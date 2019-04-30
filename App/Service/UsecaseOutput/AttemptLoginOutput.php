<?php

namespace App\Service\UsecaseOutput;

interface AttemptLoginOutput {

	/**
	 * AttemptLoginOutput constructor.
	 * @param bool $isLogin
	 */
	public function __construct(bool $isLogin);
}