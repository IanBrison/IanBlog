<?php

namespace App\Service\UsecaseOutput\Impls\PrepareThoughtPageOutput;

use App\Model\Read\Thought;
use App\Service\UsecaseOutput\PrepareThoughtPageOutput;

class ThoughtPageInfo implements PrepareThoughtPageOutput {

	private $thought;

	public function __construct(Thought $thought) {
		$this->thought = $thought;
	}

	public function getThought(): Thought {
		return $this->thought;
	}
}