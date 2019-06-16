<?php

namespace Test\Unit\Service\Usecase;

use App\Model\Read\Thought;
use App\Service\Repository\Write\ThoughtRepository;
use App\Service\Usecase\Impls\CreateThoughtUsecase;
use App\Service\UsecaseInput\CreateThoughtInput;
use App\Service\UsecaseOutput\CreateThoughtOutput;
use App\Service\DiContainer as Di;
use Exception;
use Mockery;
use Test\TestCase;

class CreateThoughtTest extends TestCase {

	/**
	 * @test
	 */
	public function execute() {
		$titleInput = 'title';
		$contentInput = 'content';
		$keyInput = 'key';
		$input = Mockery::mock(CreateThoughtInput::class);
		$input->shouldReceive([
			'getTitleInput' => $titleInput,
			'getContentInput' => $contentInput,
			'getKeyInput' => $keyInput,
		]);
		$thought = Mockery::mock(Thought::class);
		$thoughtRepository = Mockery::mock(ThoughtRepository::class);
		$thoughtRepository->shouldReceive('create')->andReturn($thought);
		Di::mock(ThoughtRepository::class, $thoughtRepository);

		$usecase = new CreateThoughtUsecase($input);
		$output = $usecase->execute();
		$this->assertFalse($output->hasError());
		$this->assertSame($thought, $output->getThought());
	}

	/**
	 * @test
	 */
	public function executeWithSavingError() {
		$titleInput = 'title';
		$contentInput = 'content';
		$keyInput = 'key';
		$input = Mockery::mock(CreateThoughtInput::class);
		$input->shouldReceive([
			'getTitleInput' => $titleInput,
			'getContentInput' => $contentInput,
			'getKeyInput' => $keyInput,
		]);
		$thoughtRepository = Mockery::mock(ThoughtRepository::class);
		$thoughtRepository->shouldReceive('create')->andThrow(Exception::class);
		Di::mock(ThoughtRepository::class, $thoughtRepository);

		$usecase = new CreateThoughtUsecase($input);
		$output = $usecase->execute();
		$this->assertTrue($output->hasError());
		$this->assertSame(CreateThoughtOutput::SAVING_ERROR, $output->getErrorCode());
	}

	/**
	 * @test
	 */
	public function executeWithInputError() {
		$titleInput = '';
		$input = Mockery::mock(CreateThoughtInput::class);
		$input->shouldReceive([
			'getTitleInput' => $titleInput,
		]);

		$usecase = new CreateThoughtUsecase($input);
		$output = $usecase->execute();
		$this->assertTrue($output->hasError());
		$this->assertSame(CreateThoughtOutput::INPUT_ERROR, $output->getErrorCode());
	}
}