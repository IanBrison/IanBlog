<?php

namespace App\Model\Read;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Title;
use App\Model\Write\Post\UpdatePost;

trait PostTrait {

	public abstract function id(): int;

    public function update(Title $title, Content $content): UpdatePost {
        return new UpdatePost($this->id(), $title, $content);
    }
}