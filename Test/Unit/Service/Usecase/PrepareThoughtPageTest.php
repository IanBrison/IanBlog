<?php

namespace Test\Unit\Service\Usecase;

use App\Model\Read\Thought;
use App\Service\Repository\Read\ThoughtRepository;
use App\Service\Usecase\PrepareThoughtPage;
use App\Service\UsecaseInput\PrepareThoughtPageInput;
use App\Service\UsecaseOutput\PrepareThoughtPageOutput;
use Core\Di\DiContainer as Di;
use Test\TestCase;

class PrepareThoughtPageTest extends TestCase {

	/**
	 * @test
	 */
	public function execute() {
		$thoughtId = 1;
		$input = \Mockery::mock(PrepareThoughtPageInput::class);
		$input->shouldReceive('getThoughtId')->andReturn($thoughtId);
		$thought = \Mockery::mock(Thought::class);
		$thoughtRepository = \Mockery::mock(ThoughtRepository::class);
		$thoughtRepository->shouldReceive('getById')
			->with($thoughtId)
			->andReturn($thought);
		Di::mock(ThoughtRepository::class, $thoughtRepository);
		$output = \Mockery::mock(PrepareThoughtPageOutput::class);
		Di::mockWithInput(PrepareThoughtPageOutput::class, $output, $thought);

		$usecase = new PrepareThoughtPage($input);
		$presenter = $usecase->execute();
		$this->assertSame($output, $presenter);
	}
}