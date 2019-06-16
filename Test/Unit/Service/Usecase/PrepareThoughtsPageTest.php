<?php

namespace Test\Unit\Service\Usecase;

use App\Model\Read\Thought;
use App\Service\Repository\Read\ThoughtRepository;
use App\Service\Usecase\Impls\PrepareThoughtsPageUsecase;
use App\Service\DiContainer as Di;
use Mockery;
use Test\TestCase;

class PrepareThoughtsPageTest extends TestCase {

	/**
	 * @test
	 */
	public function execute() {
		$thought = Mockery::mock(Thought::class);
		$thoughts = [$thought, $thought, $thought];
		$thoughtRepository = Mockery::mock(ThoughtRepository::class);
		$thoughtRepository->shouldReceive('getAll')->andReturn($thoughts);
		Di::mock(ThoughtRepository::class, $thoughtRepository);

		$usecase = new PrepareThoughtsPageUsecase();
		$output = $usecase->execute();
		$this->assertSame($thoughts, $output->getThoughts());
	}
}