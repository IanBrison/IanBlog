<?php

namespace Test\Unit\Service\Usecase;

use App\Model\Read\Thought;
use App\Service\Repository\Read\ThoughtRepository;
use App\Service\Usecase\Impls\PrepareThoughtPageUsecase;
use App\Service\UsecaseInput\PrepareThoughtPageInput;
use App\Service\DiContainer as Di;
use Mockery;
use Test\TestCase;

class PrepareThoughtPageTest extends TestCase {

	/**
	 * @test
	 */
	public function execute() {
		$thoughtId = 1;
		$input = Mockery::mock(PrepareThoughtPageInput::class);
		$input->shouldReceive('getThoughtId')->andReturn($thoughtId);
		$thought = Mockery::mock(Thought::class);
		$thoughtRepository = Mockery::mock(ThoughtRepository::class);
		$thoughtRepository->shouldReceive('getById')
			->with($thoughtId)
			->andReturn($thought);
		Di::mock(ThoughtRepository::class, $thoughtRepository);

		$usecase = new PrepareThoughtPageUsecase($input);
		$output = $usecase->execute();
		$this->assertSame($thought, $output->getThought());
	}
}