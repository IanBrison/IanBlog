<?php

namespace App\Service\UsecaseInput\Impls\CreateThoughtInput;

use App\Service\UsecaseInput\CreateArticleInput;
use App\Service\UsecaseInput\CreateThoughtInput;

class FromCreateArticle implements CreateThoughtInput {

	private $title;
	private $content;
	private $key;

	public function __construct(CreateArticleInput $input) {
		$this->title = $input->getTitleInput();
		$this->content = $input->getContentInput();
		$this->key = $input->getKeyInput();
	}

	public function getTitleInput(): string {
		return $this->title;
	}

	public function getContentInput(): string {
		return $this->content;
	}

	public function getKeyInput(): string {
		return $this->key;
	}
}