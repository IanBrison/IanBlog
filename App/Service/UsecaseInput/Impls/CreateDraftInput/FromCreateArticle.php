<?php

namespace App\Service\UsecaseInput\Impls\CreateDraftInput;

use App\Service\UsecaseInput\CreateArticleInput;
use App\Service\UsecaseInput\CreateDraftInput;

class FromCreateArticle implements CreateDraftInput {

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