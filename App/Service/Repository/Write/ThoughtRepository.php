<?php

namespace App\Service\Repository\Write;

use App\Model\Read\Thought;
use App\Model\Write\Thought\CreateThought;

interface ThoughtRepository {

	public function create(CreateThought $thought): Thought;
}