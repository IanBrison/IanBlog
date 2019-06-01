<?php

namespace App\Model\Write\Draft;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Title;

class UpdateDraft {

    private $id;
    private $title;
    private $content;

    public function __construct(int $id, Title $title, Content $content) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
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
}