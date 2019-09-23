<?php

namespace App\Service\Usecase\Impls;

use App\Service\Repository\Read\PostRepository;
use App\Service\Usecase\PreparePostsPage;
use App\Service\UsecaseOutput\Impls\PreparePostsPageOutput\PostsPageInfo;
use App\Service\UsecaseOutput\PreparePostsPageOutput;

class PreparePostsPageUsecase implements PreparePostsPage {

    private $postRepository;

    public function __construct(PostRepository $postRepository) {
        $this->postRepository = $postRepository;
    }

    public function execute(): PreparePostsPageOutput {
		$posts = $this->postRepository->getAll();
		return new PostsPageInfo($posts);
	}
}