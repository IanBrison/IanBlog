<?php

namespace App\Model\Read;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Key;
use App\Model\ValueObject\Title;
use App\Model\Write\Thought\RenewThought;
use App\Model\Write\Thought\UpdateThought;

trait ThoughtTrait {

	public abstract function id(): int;

    public abstract function title(): Title;

    public abstract function content(): Content;

    public abstract function key(): Key;

    public function update(): UpdateThought {
        return new UpdateThought($this->id(), $this->title(), $this->content(), $this->key());
    }

    public function renew(): RenewThought {
        return new RenewThought($this->id(), $this->title(), $this->content(), $this->key());
    }
}