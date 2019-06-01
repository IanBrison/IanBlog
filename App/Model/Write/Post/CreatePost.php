<?php

namespace App\Model\Write\Post;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Date;
use App\Model\ValueObject\Title;

class CreatePost {

	private $title;
	private $content;
	private $publishedAt;

	public function __construct(Title $title, Content $content) {
		$this->title = $title;
		$this->content = $content;
		$this->publishedAt = Date::now();
	}

	public function title(): Title {
		return $this->title;
	}

	public function content(): Content {
		return $this->content;
	}

	public function publishedAt(): Date {
	    return $this->publishedAt;
    }
}