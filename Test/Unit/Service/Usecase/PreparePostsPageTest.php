<?php

namespace Test\Unit\Service\Usecase;

use App\Service\Repository\Read\PostRepository;
use App\Service\Usecase\PreparePostsPage;
use App\Service\UsecaseInput\PreparePostsPageInput;
use App\Service\UsecaseOutput\PreparePostsPageOutput;
use Core\Di\DiContainer as Di;
use Test\TestCase;

class PreparePostsPageTest extends TestCase {

	/**
	 * @test
	 */
	public function execute() {
		$input = \Mockery::mock(PreparePostsPageInput::class);
		$postRepository = \Mockery::mock(PostRepository::class);
		$postRepository->shouldReceive('getAll')->andReturn([]);
		Di::set(PostRepository::class, $postRepository);
		$output = \Mockery::mock(PreparePostsPageOutput::class);
		Di::set(PreparePostsPageOutput::class, $output);

		$usecase = new PreparePostsPage($input);
		$presenter = $usecase->execute();
		$this->assertSame($output, $presenter);
	}
}