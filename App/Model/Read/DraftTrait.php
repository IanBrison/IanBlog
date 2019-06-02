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

    public function update(Title $title, Content $content): UpdateDraft {
        return new UpdateDraft($this->id(), $title, $content);
    }

    public function publishAsPost(Title $title, Content $content): CreatePost {
        return new CreatePost($title, $content);
    }

    public function publishAsThought(Title $title, Content $content, Key $key): CreateThought {
        return new CreateThought($title, $content, $key);
    }

    public function delete(): DeleteDraft {
        return new DeleteDraft($this->id());
    }
}