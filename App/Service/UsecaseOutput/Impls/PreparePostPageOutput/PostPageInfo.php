<?php

namespace App\Service\UsecaseOutput\Impls\PreparePostPageOutput;

use App\Model\Read\Post;
use App\Service\UsecaseOutput\PreparePostPageOutput;

class PostPageInfo implements PreparePostPageOutput {

	private $post;

	public function __construct(Post $post) {
		$this->post = $post;
	}

	public function getPost(): Post {
		return $this->post;
	}
}