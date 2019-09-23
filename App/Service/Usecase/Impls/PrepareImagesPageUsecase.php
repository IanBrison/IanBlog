<?php

namespace App\Service\Usecase\Impls;

use App\Service\Repository\Read\AuthRepository;
use App\Service\Repository\Read\ImageRepository;
use App\Service\Usecase\PrepareImagesPage;
use App\Service\UsecaseOutput\Impls\PrepareImagesPageOutput\ImagesPageInfo;
use App\Service\UsecaseOutput\Impls\PrepareImagesPageOutput\IsNotAuthenticated;
use App\Service\UsecaseOutput\PrepareImagesPageOutput;

class PrepareImagesPageUsecase implements PrepareImagesPage {

    private $authRepository;
    private $imageRepository;

    public function __construct(AuthRepository $authRepository, ImageRepository $imageRepository) {
        $this->authRepository = $authRepository;
        $this->imageRepository = $imageRepository;
    }

    public function execute(): PrepareImagesPageOutput {
        if (!$this->authRepository->isAuthenticated()) {
            return new IsNotAuthenticated();
        }

        $images = $this->imageRepository->getAll();
        return new ImagesPageInfo($images);
    }
}