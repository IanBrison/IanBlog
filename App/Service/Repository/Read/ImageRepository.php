<?php

namespace App\Service\Repository\Read;

use App\Model\Read\Image;

interface ImageRepository {

	/**
	 * @return Image[]
	 */
	public function getAll(): array;
}