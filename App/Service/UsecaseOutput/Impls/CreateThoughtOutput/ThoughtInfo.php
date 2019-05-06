<?php

namespace App\Service\UsecaseOutput\Impls\CreateThoughtOutput;

use App\Model\Read\Thought;
use App\Service\UsecaseOutput\CreateThoughtOutput;
use App\System\Exception\UncallableException;

class ThoughtInfo implements CreateThoughtOutput {

	private $thought;

	public function __construct(Thought $thought) {
		$this->thought = $thought;
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

	public function getThought(): Thought {
		return $this->thought;
	}
}