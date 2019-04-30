<?php

namespace App\Service\Repository\Read;

interface AuthRepository {

	public function isAuthenticated(): bool;

	public function attemptLogin(string $password): bool;
}