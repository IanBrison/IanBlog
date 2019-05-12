<?php

namespace App\Infrastructure\Repository\Query;

use App\Service\Repository\Read\AuthRepository;
use Core\Di\DiContainer as Di;
use Core\Session\Session;

class AuthQuery implements AuthRepository {

	public function isAuthenticated(): bool {
		/** @var Session $session */
		$session = Di::get(Session::class);
		return $session->isAuthenticated();
	}

	public function attemptLogin(string $password): bool {
		if ($password !== "test") {
			return false;
		}
		/** @var Session $session */
		$session = Di::get(Session::class);
		$session->setAuthenticated(true);
		return true;
	}
}