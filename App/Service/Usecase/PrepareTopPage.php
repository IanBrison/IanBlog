<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\PrepareTopPageInput;
use App\Service\UsecaseOutput\PrepareTopPageOutput;
use Core\Di\DiContainer as Di;

class PrepareTopPage {
	
	private $input;
	
	public function __construct(PrepareTopPageInput $input) {
		$this->input = $input;
	}

	public function execute(): PrepareTopPageOutput {
		return Di::get(PrepareTopPageOutput::class);
	}
}