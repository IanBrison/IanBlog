<?php

namespace App\Service\UsecaseOutput;

interface PrepareLoginPageOutput {

	public function isAlreadyLogin(): bool;
}