<?php

namespace App\Model\Read;

use App\Model\ValueObject\Content;
use App\Model\ValueObject\Title;

interface Article {

	public function id(): int;

	public function title(): Title;

	public function content(): Content;
}