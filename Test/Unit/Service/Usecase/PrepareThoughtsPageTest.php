<?php

namespace Test\Unit\Service\Usecase;

use App\Model\Read\Thought;
use App\Service\Repository\Read\ThoughtRepository;
use App\Service\Usecase\PrepareThoughtsPage;
use Core\Di\DiContainer as Di;
use Test\TestCase;

class PrepareThoughtsPageTest extends TestCase {

	/**
	 * @test
	 */
	public function execute() {
		$thought = \Mockery::mock(Thought::class);
		$thoughts = [$thought, $thought, $thought];
		$thoughtRepository = \Mockery::mock(ThoughtRepository::class);
		$thoughtRepository->shouldReceive('getAll')->andReturn($thoughts);
		Di::mock(ThoughtRepository::class, $thoughtRepository);

		$usecase = new PrepareThoughtsPage();
		$output = $usecase->execute();
		$this->assertSame($thoughts, $output->getThoughts());
	}
}