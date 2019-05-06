<?php

namespace App\Service\UsecaseOutput\Impls\CreatePostOutput;

use App\Model\Read\Post;
use App\Service\UsecaseOutput\CreatePostOutput;
use App\System\Exception\UncallableException;

class PostInfo implements CreatePostOutput {

	private $post;

	public function __construct(Post $post) {
		$this->post = $post;
	}

	public function hasError(): bool {
		return false;
	}

	/**
	 * @return int
	 * @throws UncallableException
	 */
	public function getErrorCode(): int {
		throw new UncallableException();
	}

	public function getPost(): Post {
		return $this->post;
	}
}