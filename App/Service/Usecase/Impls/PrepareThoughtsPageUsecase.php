<?php

namespace App\Service\Usecase\Impls;

use App\Service\Repository\Read\ThoughtRepository;
use App\Service\Usecase\PrepareThoughtsPage;
use App\Service\UsecaseOutput\Impls\PrepareThoughtsPageOutput\ThoughtsPageInfo;
use App\Service\UsecaseOutput\PrepareThoughtsPageOutput;

class PrepareThoughtsPageUsecase implements PrepareThoughtsPage {

    private $thoughtRepository;

    public function __construct(ThoughtRepository $thoughtRepository) {
        $this->thoughtRepository = $thoughtRepository;
    }

    public function execute(): PrepareThoughtsPageOutput {
		$thoughts = $this->thoughtRepository->getAll();
		return new ThoughtsPageInfo($thoughts);
	}
}