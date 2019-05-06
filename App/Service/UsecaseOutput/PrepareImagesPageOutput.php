<?php

namespace App\Service\UsecaseOutput;

use App\Model\Read\Image;

interface PrepareImagesPageOutput {

	public function isAuthenticated(): bool;

	/**
	 * @return Image[]
	 */
	public function getImages(): array;
}