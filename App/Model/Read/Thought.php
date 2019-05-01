<?php

namespace App\Model\Read;

use App\Model\ValueObject\Date;
use App\Model\ValueObject\Key;

interface Thought extends PublishedArticle {

	public function key(): Key;

	public function renewedAt(): Date;
}