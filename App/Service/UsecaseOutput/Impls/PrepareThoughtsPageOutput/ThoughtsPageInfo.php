<?php

namespace App\Service\UsecaseOutput\Impls\PrepareThoughtsPageOutput;

use App\Model\Read\Thought;
use App\Service\UsecaseOutput\PrepareThoughtsPageOutput;

class ThoughtsPageInfo implements PrepareThoughtsPageOutput {

	private $thoughts;

	/**
	 * ThoughtsPageInfo constructor.
	 * @param Thought[] $thoughts
	 */
	public function __construct(array $thoughts) {
		$this->thoughts = $thoughts;
	}

	/**
	 * @return Thought[]
	 */
	public function getThoughts(): array {
		return $this->thoughts;
	}
}