<?php

namespace App\Service\UsecaseOutput\Impls\UpdatePostOutput;

use App\Model\Read\Post;
use App\Service\UsecaseOutput\UpdatePostOutput;
use App\System\Exception\UncallableException;

class InputError implements UpdatePostOutput {

	public function hasError(): bool {
		return true;
	}

	public function getErrorCode(): int {
		return self::INPUT_ERROR;
	}

	/**
	 * @throws UncallableException
	 */
	public function getPost(): Post {
		throw new UncallableException();
	}
}