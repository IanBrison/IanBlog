<?php

namespace App\Service\Repository\Write;

use App\Model\Read\Post;
use App\Model\Write\Post\CreatePost;
use App\Model\Write\Post\UpdatePost;

interface PostRepository {

	public function create(CreatePost $post): Post;

	public function update(UpdatePost $post): Post;
}