<?php

namespace App\Service\UsecaseOutput\Impls\CreateThoughtOutput;

use App\Model\Read\Thought;
use App\Service\UsecaseOutput\CreateThoughtOutput;
use App\System\Exception\UncallableException;

class SavingError implements CreateThoughtOutput {

	public function hasError(): bool {
		return true;
	}

	public function getErrorCode(): int {
		return self::SAVING_ERROR;
	}

	/**
	 * @return Thought
	 * @throws UncallableException
	 */
	public function getThought(): Thought {
		throw new UncallableException();
	}
}