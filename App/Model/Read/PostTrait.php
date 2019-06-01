<?php

namespace App\Model\Read;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Title;
use App\Model\Write\Post\UpdatePost;

trait PostTrait {

	public abstract function id(): int;

    public abstract function title(): Title;

    public abstract function content(): Content;

    public function update(): UpdatePost {
        return new UpdatePost($this->id(), $this->title(), $this->content());
    }
}