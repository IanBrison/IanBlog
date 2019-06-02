<?php

namespace App\Service\Repository\Write;

use App\Model\Read\Thought;
use App\Model\Write\Thought\CreateThought;
use App\Model\Write\Thought\UpdateThought;

interface ThoughtRepository {

	public function create(CreateThought $thought): Thought;

	public function update(UpdateThought $thought): Thought;
}