<?php

namespace App\Model\Read;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Date;
use App\Model\ValueObject\Key;
use App\Model\ValueObject\Title;
use App\Model\Write\Thought\RenewThought;
use App\Model\Write\Thought\UpdateThought;

interface Thought extends PublishedArticle {

	public function key(): Key;

	public function renewedAt(): Date;

    public function update(Title $title, Content $content, Key $key): UpdateThought;

    public function renew(Title $title, Content $content, Key $key): RenewThought;
}