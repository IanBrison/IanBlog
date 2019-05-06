<?php

namespace App\Service\UsecaseOutput\Impls\CreateDraftOutput;

use App\Model\Read\Draft;
use App\Service\UsecaseOutput\CreateDraftOutput;
use App\System\Exception\UncallableException;

class InputError implements CreateDraftOutput {

	public function hasError(): bool {
		return true;
	}

	public function getErrorCode(): int {
		return self::INPUT_ERROR;
	}

	/**
	 * @return Draft
	 * @throws UncallableException
	 */
	public function getDraft(): Draft {
		throw new UncallableException();
	}
}