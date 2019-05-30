<?php

namespace App\Infrastructure\Repository\Entity\Mocks;

use App\Model\Read\Thought;
use App\Model\ValueObject\Content;
use App\Model\ValueObject\Date;
use App\Model\ValueObject\Key;
use App\Model\ValueObject\Title;

class ThoughtEntity implements Thought {

    private $id;
    private $title;
    private $content;
    private $key;
    private $renewedAt;

    public function __construct(int $id, Title $title, Content $content, Key $key, Date $renewedAt) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->key = $key;
        $this->renewedAt = $renewedAt;
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

    public function renewedAt(): Date {
        return $this->renewedAt;
    }
}