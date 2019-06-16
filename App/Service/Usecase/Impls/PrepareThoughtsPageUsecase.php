<?php

namespace App\Service\Usecase\Impls;

use App\Service\Repository\Read\ThoughtRepository;
use App\Service\Usecase\PrepareThoughtsPage;
use App\Service\UsecaseOutput\Impls\PrepareThoughtsPageOutput\ThoughtsPageInfo;
use App\Service\UsecaseOutput\PrepareThoughtsPageOutput;
use App\Service\DiContainer as Di;

class PrepareThoughtsPageUsecase implements PrepareThoughtsPage {

	public function execute(): PrepareThoughtsPageOutput {
		$thoughts = Di::get(ThoughtRepository::class)->getAll();
		return new ThoughtsPageInfo($thoughts);
	}
}