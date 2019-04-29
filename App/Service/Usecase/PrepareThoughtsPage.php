<?php

namespace App\Service\Usecase;

use App\Service\Repository\Read\ThoughtRepository;
use App\Service\UsecaseInput\PrepareThoughtsPageInput;
use App\Service\UsecaseOutput\PrepareThoughtsPageOutput;
use Core\Di\DiContainer as Di;

class PrepareThoughtsPage {

	private $input;

	public function __construct(PrepareThoughtsPageInput $input) {
		$this->input = $input;
	}

	public function execute(): PrepareThoughtsPageOutput {
		$thoughts = Di::get(ThoughtRepository::class)->getAll();
		return Di::get(PrepareThoughtsPageOutput::class, $thoughts);
	}
}