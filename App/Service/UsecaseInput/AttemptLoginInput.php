<?php

namespace App\Service\UsecaseInput;

interface AttemptLoginInput {

	public function getPassword(): string;
}