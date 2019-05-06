<?php

namespace App\Service\UsecaseOutput;

use App\Model\Read\Thought;

interface PrepareThoughtPageOutput {

	public function getThought(): Thought;
}