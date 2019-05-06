<?php

namespace App\Service\UsecaseOutput\Impls\PrepareImagesPageOutput;

use App\Model\Read\Image;
use App\Service\UsecaseOutput\PrepareImagesPageOutput;

class ImagesPageInfo implements PrepareImagesPageOutput {

	private $images;

	/**
	 * ImagesPageInfo constructor.
	 * @param Image[] $images
	 */
	public function __construct(array $images) {
		$this->images = $images;
	}

	public function isAuthenticated(): bool {
		return true;
	}

	/**
	 * @return Image[]
	 */
	public function getImages(): array {
		return $this->images;
	}
}