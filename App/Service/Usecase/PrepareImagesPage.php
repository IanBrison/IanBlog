<?php

namespace App\Service\Usecase;

use App\Service\UsecaseOutput\PrepareImagesPageOutput;

interface PrepareImagesPage {

    public function execute(): PrepareImagesPageOutput;
}