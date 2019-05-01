<?php

namespace App\Model\Write\Post;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Title;

class CreatePost {

	private $title;
	private $content;

	public function __construct(Title $title, Content $content) {
		$this->title = $title;
		$this->content = $content;
	}

	public function title(): Title {
		return $this->title;
	}

	public function content(): Content {
		return $this->content;
	}
}