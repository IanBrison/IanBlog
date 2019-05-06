<?php

namespace App\Service\UsecaseOutput;

use App\Model\Read\Thought;

interface PrepareThoughtsPageOutput {

	/**
	 * @return Thought[]
	 */
	public function getThoughts(): array;
}