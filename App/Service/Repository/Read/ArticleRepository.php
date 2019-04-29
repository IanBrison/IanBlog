<?php

namespace App\Service\Repository\Read;

use App\Model\Read\Article;

interface ArticleRepository {

	/**
	 * get all articles including the drafts
	 * @return Article[]
	 */
	public function getAll(): array;
}