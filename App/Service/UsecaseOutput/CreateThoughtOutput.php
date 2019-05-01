<?php

namespace App\Service\UsecaseOutput;

use App\Model\Read\Thought;

interface CreateThoughtOutput {

	public function __construct(int $errorCode, ?Thought $thought = null);
}