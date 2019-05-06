<?php

namespace App\Service\UsecaseOutput\Impls\CreateDraftOutput;

use App\Model\Read\Draft;
use App\Service\UsecaseOutput\CreateDraftOutput;
use App\System\Exception\UncallableException;

class DraftInfo implements CreateDraftOutput {

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