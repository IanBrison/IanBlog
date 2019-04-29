<?php

namespace App\Model\Read;

interface PublishedArticle extends Article {

	public function isTypePost(): bool;

	public function isTypeThought(): bool;
}