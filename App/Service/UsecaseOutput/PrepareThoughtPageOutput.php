<?php

namespace App\Service\UsecaseOutput;

use App\Model\Read\Thought;

interface PrepareThoughtPageOutput {

	public function __construct(Thought $thought);
}