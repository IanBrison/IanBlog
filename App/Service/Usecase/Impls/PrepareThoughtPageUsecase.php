<?php

namespace App\Service\Usecase\Impls;

use App\Service\Repository\Read\ThoughtRepository;
use App\Service\Usecase\PrepareThoughtPage;
use App\Service\UsecaseInput\PrepareThoughtPageInput;
use App\Service\UsecaseOutput\Impls\PrepareThoughtPageOutput\ThoughtPageInfo;
use App\Service\UsecaseOutput\PrepareThoughtPageOutput;
use App\Service\DiContainer as Di;

class PrepareThoughtPageUsecase implements PrepareThoughtPage {

	private $input;

	public function __construct(PrepareThoughtPageInput $input) {
		$this->input = $input;
	}

	public function execute(): PrepareThoughtPageOutput {
		$thoughtId = $this->input->getThoughtId();
		$thought = Di::get(ThoughtRepository::class)->getById($thoughtId);
		return new ThoughtPageInfo($thought);
	}
}