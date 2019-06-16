<?php

namespace Test\Unit\Service\Usecase;

use App\Model\Read\Post;
use App\Service\Repository\Write\PostRepository;
use App\Service\Usecase\Impls\CreatePostUsecase;
use App\Service\UsecaseInput\CreatePostInput;
use App\Service\UsecaseOutput\CreatePostOutput;
use App\Service\DiContainer as Di;
use Exception;
use Mockery;
use Test\TestCase;

class CreatePostTest extends TestCase {

	/**
	 * @test
	 */
	public function execute() {
		$titleInput = 'title';
		$contentInput = 'content';
		$input = Mockery::mock(CreatePostInput::class);
		$input->shouldReceive([
			'getTitleInput' => $titleInput,
			'getContentInput' => $contentInput,
		]);
		$post = Mockery::mock(Post::class);
		$postRepository = Mockery::mock(PostRepository::class);
		$postRepository->shouldReceive('create')->andReturn($post);
		Di::mock(PostRepository::class, $postRepository);

		$usecase = new CreatePostUsecase($input);
		$output = $usecase->execute();
		$this->assertFalse($output->hasError());
		$this->assertSame($post, $output->getPost());
	}

	/**
	 * @test
	 */
	public function executeWithSavingError() {
		$titleInput = 'title';
		$contentInput = 'content';
		$input = Mockery::mock(CreatePostInput::class);
		$input->shouldReceive([
			'getTitleInput' => $titleInput,
			'getContentInput' => $contentInput,
		]);
		$postRepository = Mockery::mock(PostRepository::class);
		$postRepository->shouldReceive('create')->andThrow(Exception::class);
		Di::mock(PostRepository::class, $postRepository);

		$usecase = new CreatePostUsecase($input);
		$output = $usecase->execute();
		$this->assertTrue($output->hasError());
		$this->assertSame(CreatePostOutput::SAVING_ERROR, $output->getErrorCode());
	}

	/**
	 * @test
	 */
	public function executeWithInputError() {
		$titleInput = '';
		$input = Mockery::mock(CreatePostInput::class);
		$input->shouldReceive([
			'getTitleInput' => $titleInput,
		]);

		$usecase = new CreatePostUsecase($input);
		$output = $usecase->execute();
		$this->assertTrue($output->hasError());
		$this->assertSame(CreatePostOutput::INPUT_ERROR, $output->getErrorCode());
	}
}