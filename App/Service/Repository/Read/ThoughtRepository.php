<?php

namespace App\Service\Repository\Read;

use App\Model\Read\Thought;
use App\System\Exception\DataNotFoundException;

interface ThoughtRepository {

	/**
	 * get all thoughts in the order of the renewed date
	 * @return Thought[]
	 */
	public function getAll(): array;

	/**
	 * @param int $thoughtId
	 * @return Thought
	 * @throws DataNotFoundException
	 */
	public function getById(int $thoughtId): Thought;
}