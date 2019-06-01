<?php

namespace App\Model\Read;

use App\Model\ValueObject\Date;

interface PublishedArticle extends Article {

    public function publishedAt(): Date;
}