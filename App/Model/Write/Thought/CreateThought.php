<?php

namespace App\Model\Write\Thought;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Key;
use App\Model\ValueObject\Title;

class CreateThought {

	private $title;
	private $content;
	private $key;

	public function __construct(Title $title, Content $content, Key $key) {
		$this->title = $title;
		$this->content = $content;
		$this->key = $key;
	}

	public function title(): Title {
		return $this->title;
	}

	public function content(): Content {
		return $this->content;
	}

	public function key(): Key {
		return $this->key;
	}
}