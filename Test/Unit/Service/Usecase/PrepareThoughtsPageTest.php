<?php

namespace Test\Unit\Service\Usecase;

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
		$thoughRepository = \Mockery::mock(ThoughtRepository::class);
		$thoughRepository->shouldReceive('getAll')->andReturn([]);
		Di::set(ThoughtRepository::class, $thoughRepository);
		$output = \Mockery::mock(PrepareThoughtsPageOutput::class);
		Di::set(PrepareThoughtsPageOutput::class, $output);

		$usecase = new PrepareThoughtsPage($input);
		$presenter = $usecase->execute();
		$this->assertSame($output, $presenter);
	}
}