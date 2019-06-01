<?php

namespace App\Model\Write\Thought;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Date;
use App\Model\ValueObject\Key;
use App\Model\ValueObject\Title;

class CreateThought {

	private $title;
	private $content;
	private $key;
	private $renewedAt;
	private $publishedAt;

	public function __construct(Title $title, Content $content, Key $key) {
		$this->title = $title;
		$this->content = $content;
		$this->key = $key;
		$now = Date::now();
		$this->publishedAt = $now;
		$this->renewedAt = $now;
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

	public function publishedAt(): Date {
	    return $this->publishedAt;
    }

	public function renewedAt(): Date {
	    return $this->renewedAt;
    }
}