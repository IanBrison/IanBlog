<?php

namespace App\Model\Read;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Key;
use App\Model\ValueObject\Title;
use App\Model\Write\Thought\RenewThought;
use App\Model\Write\Thought\UpdateThought;

trait ThoughtTrait {

	public abstract function id(): int;

    public function update(Title $title, Content $content, Key $key): UpdateThought {
        return new UpdateThought($this->id(), $title, $content, $key);
    }

    public function renew(Title $title, Content $content, Key $key): RenewThought {
        return new RenewThought($this->id(), $title, $content, $key);
    }
}