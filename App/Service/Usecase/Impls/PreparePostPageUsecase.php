<?php

namespace App\Service\Usecase\Impls;

use App\Service\Repository\Read\PostRepository;
use App\Service\Usecase\PreparePostPage;
use App\Service\UsecaseInput\PreparePostPageInput;
use App\Service\UsecaseOutput\Impls\PreparePostPageOutput\PostPageInfo;
use App\Service\UsecaseOutput\PreparePostPageOutput;
use App\System\Exception\DataNotFoundException;

class PreparePostPageUsecase implements PreparePostPage {

	private $postRepository;

	public function __construct(PostRepository $postRepository) {
		$this->postRepository = $postRepository;
	}

    /**
     * @param PreparePostPageInput $input
     * @return PreparePostPageOutput
     * @throws DataNotFoundException
     */
    public function execute(PreparePostPageInput $input): PreparePostPageOutput {
		$postId = $input->getPostId();
		$post = $this->postRepository->getById($postId);
		return new PostPageInfo($post);
	}
}