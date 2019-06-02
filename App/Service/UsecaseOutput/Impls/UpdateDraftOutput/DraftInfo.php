<?php

namespace App\Service\UsecaseOutput\Impls\UpdateDraftOutput;

use App\Model\Read\Draft;
use App\Service\UsecaseOutput\UpdateDraftOutput;
use App\System\Exception\UncallableException;

class DraftInfo implements UpdateDraftOutput {

	private $draft;

	public function __construct(Draft $draft) {
		$this->draft = $draft;
	}

	public function hasError(): bool {
		return false;
	}

	/**
	 * @return int
	 * @throws UncallableException
	 */
	public function getErrorCode(): int {
		throw new UncallableException();
	}

	public function getDraft(): Draft {
		return $this->draft;
	}
}