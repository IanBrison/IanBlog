<?php

namespace App\Model\Write\Thought;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Key;
use App\Model\ValueObject\Title;

class UpdateThought {

    private $id;
    private $title;
    private $content;
    private $key;

    public function __construct(int $id, Title $title, Content $content, Key $key) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->key = $key;
    }

	public function id(): int {
        return $this->id;
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