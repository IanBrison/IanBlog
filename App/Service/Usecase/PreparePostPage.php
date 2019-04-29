<?php

namespace App\Service\Usecase;

use App\Service\Repository\Read\PostRepository;
use App\Service\UsecaseInput\PreparePostPageInput;
use App\Service\UsecaseOutput\PreparePostPageOutput;
use Core\Di\DiContainer as Di;

class PreparePostPage {

	private $input;

	public function __construct(PreparePostPageInput $input) {
		$this->input = $input;
	}

	public function execute(): PreparePostPageOutput {
		$postId = $this->input->getPostId();
		$post = Di::get(PostRepository::class)->getById($postId);
		return Di::get(PreparePostPageOutput::class, $post);
	}
}