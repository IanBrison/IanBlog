<?php

namespace App\Service\UsecaseOutput\Impls\UpdateDraftOutput;

use App\Model\Read\Draft;
use App\Service\UsecaseOutput\UpdateDraftOutput;
use App\System\Exception\UncallableException;

class SavingError implements UpdateDraftOutput {

	public function hasError(): bool {
		return true;
	}

	public function getErrorCode(): int {
		return self::SAVING_ERROR;
	}

	/**
	 * @throws UncallableException
	 */
	public function getDraft(): Draft {
		throw new UncallableException();
	}
}