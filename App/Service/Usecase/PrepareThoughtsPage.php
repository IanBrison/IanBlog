<?php

namespace App\Service\Usecase;

use App\Service\Repository\Read\ThoughtRepository;
use App\Service\UsecaseOutput\Impls\PrepareThoughtsPageOutput\ThoughtsPageInfo;
use App\Service\UsecaseOutput\PrepareThoughtsPageOutput;
use Core\Di\DiContainer as Di;

class PrepareThoughtsPage {

	public function execute(): PrepareThoughtsPageOutput {
		$thoughts = Di::get(ThoughtRepository::class)->getAll();
		return new ThoughtsPageInfo($thoughts);
	}
}