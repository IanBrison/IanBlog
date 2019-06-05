<?php

namespace App\Infrastructure\Repository\Entity\Mocks;

use App\Model\Read\Thought;
use App\Model\Read\ThoughtTrait;
use App\Model\ValueObject\Content;
use App\Model\ValueObject\Date;
use App\Model\ValueObject\Key;
use App\Model\ValueObject\Title;

class ThoughtEntity implements Thought {

    use ThoughtTrait;

    private $id;
    private $title;
    private $content;
    private $key;
    private $renewedAt;
    private $publishedAt;

    public function __construct(int $id, Title $title, Content $content, Key $key, Date $renewedAt, Date $publishedAt) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->key = $key;
        $this->renewedAt = $renewedAt;
        $this->publishedAt = $publishedAt;
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

    public function publishedAt(): Date {
        return $this->publishedAt;
    }
}