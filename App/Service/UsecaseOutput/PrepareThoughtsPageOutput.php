<?php

namespace App\Service\UsecaseOutput;

use App\Model\Read\Thought;

interface PrepareThoughtsPageOutput {

	/**
	 * PrepareThoughtsPageOutput constructor.
	 * @param Thought[] $thoughts
	 */
	public function __construct(array $thoughts);
}