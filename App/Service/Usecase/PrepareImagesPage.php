<?php

namespace App\Service\Usecase;

use App\Service\Repository\Read\AuthRepository;
use App\Service\Repository\Read\ImageRepository;
use App\Service\UsecaseOutput\PrepareImagesPageOutput;
use Core\Di\DiContainer as Di;

class PrepareImagesPage {

	public function execute(): PrepareImagesPageOutput {
		if (!Di::get(AuthRepository::class)->isAuthenticated()) {
			return Di::get(PrepareImagesPageOutput::class, false);
		}

		$images = Di::get(ImageRepository::class)->getAll();
		return Di::get(PrepareImagesPageOutput::class, true, $images);
	}
}