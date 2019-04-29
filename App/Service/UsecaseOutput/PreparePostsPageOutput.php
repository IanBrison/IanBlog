<?php

namespace App\Service\UsecaseOutput;

use App\Model\Read\Post;

interface PreparePostsPageOutput {

	/**
	 * PreparePostsPageOutput constructor.
	 * @param Post[] $posts
	 */
	public function __construct(array $posts);
}