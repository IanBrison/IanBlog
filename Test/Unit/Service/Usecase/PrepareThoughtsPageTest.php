<?php

namespace Test\Unit\Service\Usecase;

use App\Model\Read\Thought;
use App\Service\Repository\Read\ThoughtRepository;
use App\Service\Usecase\PrepareThoughtsPage;
use App\Service\UsecaseInput\PrepareThoughtsPageInput;
use App\Service\UsecaseOutput\PrepareThoughtsPageOutput;
use Core\Di\DiContainer as Di;
use Test\TestCase;

class PrepareThoughtsPageTest extends TestCase {

	/**
	 * @test
	 */
	public function execute() {
		$input = \Mockery::mock(PrepareThoughtsPageInput::class);
		$thought = \Mockery::mock(Thought::class);
		$thoughts = [$thought, $thought, $thought];
		$thoughtRepository = \Mockery::mock(ThoughtRepository::class);
		$thoughtRepository->shouldReceive('getAll')->andReturn($thoughts);
		Di::mock(ThoughtRepository::class, $thoughtRepository);
		$output = \Mockery::mock(PrepareThoughtsPageOutput::class);
		Di::mockWithInput(PrepareThoughtsPageOutput::class, $output, $thoughts);

		$usecase = new PrepareThoughtsPage($input);
		$presenter = $usecase->execute();
		$this->assertSame($output, $presenter);
	}
}