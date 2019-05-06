<?php

namespace App\Service\UsecaseOutput;

use App\Model\Read\Post;

interface PreparePostsPageOutput {

	/**
	 * @return Post[]
	 */
	public function getPosts(): array;
}