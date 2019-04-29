<?php

namespace App\Model\Read;

use App\Model\ValueObject\Date;

interface Post extends PublishedArticle {

	public function publishedAt(): Date;
}