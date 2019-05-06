<?php

namespace App\Service\UsecaseOutput\Impls\PrepareImagesPageOutput;

use App\Model\Read\Image;
use App\Service\UsecaseOutput\PrepareImagesPageOutput;
use App\System\Exception\UncallableException;

class IsNotAuthenticated implements PrepareImagesPageOutput {

	public function isAuthenticated(): bool {
		return false;
	}

	/**
	 * @return Image[]
	 * @throws UncallableException
	 */
	public function getImages(): array {
		throw new UncallableException();
	}
}