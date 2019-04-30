<?php

namespace App\Service\UsecaseOutput;

interface PrepareLoginPageOutput {

	/**
	 * PrepareLoginPageOutput constructor.
	 * @param bool $isAuthenticated
	 */
	public function __construct(bool $isAuthenticated);
}