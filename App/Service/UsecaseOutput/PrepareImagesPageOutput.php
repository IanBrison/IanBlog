<?php

namespace App\Service\UsecaseOutput;

use App\Model\Read\Image;

interface PrepareImagesPageOutput {

	/**
	 * PrepareImagesPageOutput constructor.
	 * @param bool $isAuthenticated
	 * @param Image[] $images
	 */
	public function __construct(bool $isAuthenticated, array $images = []);
}