<?php

namespace App\Service\UsecaseOutput\Impls\UpdatePostOutput;

use App\Model\Read\Post;
use App\Service\UsecaseOutput\UpdatePostOutput;
use App\System\Exception\UncallableException;

class PostInfo implements UpdatePostOutput {

	private $post;

	public function __construct(Post $post) {
		$this->post = $post;
	}

	public function hasError(): bool {
		return false;
	}

	/**
	 * @throws UncallableException
	 */
	public function getErrorCode(): int {
		throw new UncallableException();
	}

	public function getPost(): Post {
		return $this->post;
	}
}