<?php

namespace App\Service\Repository\Write;

use App\Model\Read\Post;
use App\Model\Write\Post\CreatePost;

interface PostRepository {

	public function create(CreatePost $post): Post;
}