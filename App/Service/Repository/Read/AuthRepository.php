<?php

namespace App\Service\Repository\Read;

interface AuthRepository {

	public function isAuthenticated(): bool;
}