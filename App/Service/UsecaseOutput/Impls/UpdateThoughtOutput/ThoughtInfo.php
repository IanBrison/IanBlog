<?php

namespace App\Service\UsecaseOutput\Impls\UpdateThoughtOutput;

use App\Model\Read\Thought;
use App\Service\UsecaseOutput\UpdateThoughtOutput;
use App\System\Exception\UncallableException;

class ThoughtInfo implements UpdateThoughtOutput {

	private $thought;

	public function __construct(Thought $thought) {
		$this->thought = $thought;
	}

	public function hasError(): bool {
		return false;
	}

	/**
	 * @throws UncallableException
	 */
	public function getErrorCode(): int {
		throw new UncallableException();
	}

	public function getThought(): Thought {
		return $this->thought;
	}
}