<?php

namespace App\Service\Repository\Read;

use App\Model\Read\Post;
use App\System\Exception\DataNotFoundException;

interface PostRepository {

	/**
	 * get all posts in the order of the published date
	 * @return Post[]
	 */
	public function getAll(): array;

	/**
	 * @param int $postId
	 * @return Post
	 * @throws DataNotFoundException
	 */
	public function getById(int $postId): Post;
}