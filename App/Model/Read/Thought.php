<?php

namespace App\Model\Read;

use App\Model\ValueObject\Date;

interface Thought extends PublishedArticle {

	public function key(): string;

	public function renewedAt(): Date;
}