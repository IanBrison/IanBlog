<?php

namespace App\Service\Repository\Read;

use App\Model\Read\Article;
use App\System\Exception\DataNotFoundException;

interface ArticleRepository {

	/**
	 * get all articles including the drafts
	 * @return Article[]
	 */
	public function getAll(): array;

	/**
	 * @param int $articleId
	 * @return Article
	 * @throws DataNotFoundException
	 */
	public function getById(int $articleId): Article;
}