<?php

namespace App\Service\UsecaseInput\Impls\CreatePostInput;

use App\Service\UsecaseInput\CreateArticleInput;
use App\Service\UsecaseInput\CreatePostInput;

class FromCreateArticle implements CreatePostInput {

	private $title;
	private $content;

	public function __construct(CreateArticleInput $input) {
		$this->title = $input->getTitleInput();
		$this->content = $input->getContentInput();
	}

	public function getTitleInput(): string {
		return $this->title;
	}

	public function getContentInput(): string {
		return $this->content;
	}

}