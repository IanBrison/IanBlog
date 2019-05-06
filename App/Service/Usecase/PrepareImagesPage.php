<?php

namespace App\Service\Usecase;

use App\Service\Repository\Read\AuthRepository;
use App\Service\Repository\Read\ImageRepository;
use App\Service\UsecaseOutput\Impls\PrepareImagesPageOutput\ImagesPageInfo;
use App\Service\UsecaseOutput\Impls\PrepareImagesPageOutput\IsNotAuthenticated;
use App\Service\UsecaseOutput\PrepareImagesPageOutput;
use Core\Di\DiContainer as Di;

class PrepareImagesPage {

	public function execute(): PrepareImagesPageOutput {
		if (!Di::get(AuthRepository::class)->isAuthenticated()) {
			return new IsNotAuthenticated();
		}

		$images = Di::get(ImageRepository::class)->getAll();
		return new ImagesPageInfo($images);
	}
}