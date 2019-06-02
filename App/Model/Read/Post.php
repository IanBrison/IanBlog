<?php

namespace App\Model\Read;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Title;
use App\Model\Write\Post\UpdatePost;

interface Post extends PublishedArticle {

    public function update(Title $title, Content $content): UpdatePost;
}