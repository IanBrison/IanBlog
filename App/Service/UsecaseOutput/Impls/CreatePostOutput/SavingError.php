<?php

namespace App\Service\UsecaseOutput\Impls\CreatePostOutput;

use App\Model\Read\Post;
use App\Service\UsecaseOutput\CreatePostOutput;
use App\System\Exception\UncallableException;

class SavingError implements CreatePostOutput {

	public function hasError(): bool {
		return true;
	}

	public function getErrorCode(): int {
		return self::SAVING_ERROR;
	}

	/**
	 * @return Post
	 * @throws UncallableException
	 */
	public function getPost(): Post {
		throw new UncallableException();
	}
}