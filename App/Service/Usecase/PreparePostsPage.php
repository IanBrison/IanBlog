<?php

namespace App\Service\Usecase;

use App\Service\Repository\Read\PostRepository;
use App\Service\UsecaseOutput\Impls\PreparePostsPageOutput\PostsPageInfo;
use App\Service\UsecaseOutput\PreparePostsPageOutput;
use App\Service\DiContainer as Di;

class PreparePostsPage {

	public function execute(): PreparePostsPageOutput {
		$posts = Di::get(PostRepository::class)->getAll();
		return new PostsPageInfo($posts);
	}
}