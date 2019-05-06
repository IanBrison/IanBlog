<?php

namespace Test\Unit\Service\Usecase;

use App\Model\Read\Draft;
use App\Service\Repository\Write\DraftRepository;
use App\Service\Usecase\CreateDraft;
use App\Service\UsecaseInput\CreateDraftInput;
use App\Service\UsecaseOutput\CreateDraftOutput;
use Core\Di\DiContainer as Di;
use Test\TestCase;

class CreateDraftTest extends TestCase {

	/**
	 * @test
	 */
	public function execute() {
		$titleInput = 'title';
		$contentInput = 'content';
		$input = \Mockery::mock(CreateDraftInput::class);
		$input->shouldReceive([
			'getTitleInput' => $titleInput,
			'getContentInput' => $contentInput,
		]);
		$draft = \Mockery::mock(Draft::class);
		$draftRepository = \Mockery::mock(DraftRepository::class);
		$draftRepository->shouldReceive('create')->andReturn($draft);
		Di::mock(DraftRepository::class, $draftRepository);

		$usecase = new CreateDraft($input);
		$output = $usecase->execute();
		$this->assertFalse($output->hasError());
		$this->assertSame($draft, $output->getDraft());
	}

	/**
	 * @test
	 */
	public function executeWithSavingError() {
		$titleInput = 'title';
		$contentInput = 'content';
		$input = \Mockery::mock(CreateDraftInput::class);
		$input->shouldReceive([
			'getTitleInput' => $titleInput,
			'getContentInput' => $contentInput,
		]);
		$draftRepository = \Mockery::mock(DraftRepository::class);
		$draftRepository->shouldReceive('create')->andThrow(\Exception::class);
		Di::mock(DraftRepository::class, $draftRepository);

		$usecase = new CreateDraft($input);
		$output = $usecase->execute();
		$this->assertTrue($output->hasError());
		$this->assertSame(CreateDraftOutput::SAVING_ERROR, $output->getErrorCode());
	}

	/**
	 * @test
	 */
	public function executeWithInputError() {
		$titleInput = '';
		$input = \Mockery::mock(CreateDraftInput::class);
		$input->shouldReceive([
			'getTitleInput' => $titleInput,
		]);

		$usecase = new CreateDraft($input);
		$output = $usecase->execute();
		$this->assertTrue($output->hasError());
		$this->assertSame(CreateDraftOutput::INPUT_ERROR, $output->getErrorCode());
	}
}