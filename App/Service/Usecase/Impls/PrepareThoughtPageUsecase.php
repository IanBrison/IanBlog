<?php

namespace App\Service\Usecase\Impls;

use App\Service\Repository\Read\ThoughtRepository;
use App\Service\Usecase\PrepareThoughtPage;
use App\Service\UsecaseInput\PrepareThoughtPageInput;
use App\Service\UsecaseOutput\Impls\PrepareThoughtPageOutput\ThoughtPageInfo;
use App\Service\UsecaseOutput\PrepareThoughtPageOutput;
use App\System\Exception\DataNotFoundException;

class PrepareThoughtPageUsecase implements PrepareThoughtPage {

	private $thoughtRepository;

	public function __construct(ThoughtRepository $thoughtRepository) {
		$this->thoughtRepository = $thoughtRepository;
	}

    /**
     * @param PrepareThoughtPageInput $input
     * @return PrepareThoughtPageOutput
     * @throws DataNotFoundException
     */
    public function execute(PrepareThoughtPageInput $input): PrepareThoughtPageOutput {
		$thoughtId = $input->getThoughtId();
		$thought = $this->thoughtRepository->getById($thoughtId);
		return new ThoughtPageInfo($thought);
	}
}