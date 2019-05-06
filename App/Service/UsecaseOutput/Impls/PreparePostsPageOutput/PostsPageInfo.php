<?php

namespace App\Service\UsecaseOutput\Impls\PreparePostsPageOutput;

use App\Model\Read\Post;
use App\Service\UsecaseOutput\PreparePostsPageOutput;

class PostsPageInfo implements PreparePostsPageOutput {

	private $posts;

	/**
	 * PostsPageInfo constructor.
	 * @param Post[] $posts
	 */
	public function __construct(array $posts) {
		$this->posts = $posts;
	}

	/**
	 * @return Post[]
	 */
	public function getPosts(): array {
		return $this->posts;
	}
}