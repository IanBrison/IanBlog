<?php

namespace App\Service\Usecase\Impls;

use App\Service\Repository\Read\AuthRepository;
use App\Service\Repository\Read\ImageRepository;
use App\Service\Usecase\PrepareImagesPage;
use App\Service\UsecaseOutput\Impls\PrepareImagesPageOutput\ImagesPageInfo;
use App\Service\UsecaseOutput\Impls\PrepareImagesPageOutput\IsNotAuthenticated;
use App\Service\UsecaseOutput\PrepareImagesPageOutput;
use App\Service\DiContainer as Di;

class PrepareImagesPageUsecase implements PrepareImagesPage {

    public function execute(): PrepareImagesPageOutput {
        if (!Di::get(AuthRepository::class)->isAuthenticated()) {
            return new IsNotAuthenticated();
        }

        $images = Di::get(ImageRepository::class)->getAll();
        return new ImagesPageInfo($images);
    }
}