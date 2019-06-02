<?php

namespace App\Model\Read;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Key;
use App\Model\ValueObject\Title;
use App\Model\Write\Draft\DeleteDraft;
use App\Model\Write\Draft\UpdateDraft;
use App\Model\Write\Post\CreatePost;
use App\Model\Write\Thought\CreateThought;

interface Draft extends Article {

    public function update(Title $title, Content $content): UpdateDraft;

    public function publishAsPost(Title $title, Content $content): CreatePost;

    public function publishAsThought(Title $title, Content $content, Key $key): CreateThought;

    public function delete(): DeleteDraft;
}