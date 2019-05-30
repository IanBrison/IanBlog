<?php

namespace App\Infrastructure\Repository\Entity\Mocks;

use App\Model\Read\Post;
use App\Model\ValueObject\Content;
use App\Model\ValueObject\Date;
use App\Model\ValueObject\Title;

class PostEntity implements Post {

    private $id;
    private $title;
    private $content;
    private $publishedAt;

    public function __construct(int $id, Title $title, Content $content, Date $publishedAt) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
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

    public function publishedAt(): Date {
        return $this->publishedAt;
    }
}