<?php

namespace App\Service\Usecase\Impls;

use App\Service\Repository\Read\PostRepository;
use App\Service\Usecase\PreparePostPage;
use App\Service\UsecaseInput\PreparePostPageInput;
use App\Service\UsecaseOutput\Impls\PreparePostPageOutput\PostPageInfo;
use App\Service\UsecaseOutput\PreparePostPageOutput;
use App\Service\DiContainer as Di;

class PreparePostPageUsecase implements PreparePostPage {

	private $input;

	public function __construct(PreparePostPageInput $input) {
		$this->input = $input;
	}

	public function execute(): PreparePostPageOutput {
		$postId = $this->input->getPostId();
		$post = Di::get(PostRepository::class)->getById($postId);
		return new PostPageInfo($post);
	}
}