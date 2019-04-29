<?php

namespace App\Service\Usecase;

use App\Service\Repository\Read\PostRepository;
use App\Service\UsecaseInput\PreparePostsPageInput;
use App\Service\UsecaseOutput\PreparePostsPageOutput;
use Core\Di\DiContainer as Di;

class PreparePostsPage {

	private $input;

	public function __construct(PreparePostsPageInput $input) {
		$this->input = $input;
	}

	public function execute(): PreparePostsPageOutput {
		$posts = Di::get(PostRepository::class)->getAll();
		return Di::get(PreparePostsPageOutput::class, $posts);
	}
}