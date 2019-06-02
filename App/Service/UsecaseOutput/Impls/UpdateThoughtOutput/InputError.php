<?php

namespace App\Service\UsecaseOutput\Impls\UpdateThoughtOutput;

use App\Model\Read\Thought;
use App\Service\UsecaseOutput\UpdateThoughtOutput;
use App\System\Exception\UncallableException;

class InputError implements UpdateThoughtOutput {

	public function hasError(): bool {
		return true;
	}

	public function getErrorCode(): int {
		return self::INPUT_ERROR;
	}

	/**
	 * @throws UncallableException
	 */
	public function getThought(): Thought {
		throw new UncallableException();
	}
}