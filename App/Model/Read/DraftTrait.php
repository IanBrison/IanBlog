<?php

namespace App\Model\Read;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Key;
use App\Model\ValueObject\Title;
use App\Model\Write\Draft\DeleteDraft;
use App\Model\Write\Draft\UpdateDraft;
use App\Model\Write\Post\CreatePost;
use App\Model\Write\Thought\CreateThought;

trait DraftTrait {

	public abstract function id(): int;

    public abstract function title(): Title;

    public abstract function content(): Content;

    public function update(): UpdateDraft {
        return new UpdateDraft($this->id(), $this->title(), $this->content());
    }

    public function publishAsPost(): CreatePost {
        return new CreatePost($this->title(), $this->content());
    }

    public function publishAsThought(Key $key): CreateThought {
        return new CreateThought($this->title(), $this->content(), $key);
    }

    public function delete(): DeleteDraft {
        return new DeleteDraft($this->id());
    }
}