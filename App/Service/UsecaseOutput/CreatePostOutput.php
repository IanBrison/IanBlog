<?php

namespace App\Service\UsecaseOutput;

use App\Model\Read\Post;

interface CreatePostOutput {

	public function __construct(int $errorCode, ?Post $post = null);
}