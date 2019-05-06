<?php

namespace Test\Unit\Service\Usecase;

use App\Model\Read\Post;
use App\Service\Repository\Read\PostRepository;
use App\Service\Usecase\PreparePostPage;
use App\Service\UsecaseInput\PreparePostPageInput;
use Core\Di\DiContainer as Di;
use Test\TestCase;

class PreparePostPageTest extends TestCase {

	/**
	 * @test
	 */
	public function execute() {
		$postId = 1;
		$input = \Mockery::mock(PreparePostPageInput::class);
		$input->shouldReceive('getPostId')->andReturn($postId);
		$post = \Mockery::mock(Post::class);
		$postRepository = \Mockery::mock(PostRepository::class);
		$postRepository->shouldReceive('getById')
			->with($postId)
			->andReturn($post);
		Di::mock(PostRepository::class, $postRepository);

		$usecase = new PreparePostPage($input);
		$output = $usecase->execute();
		$this->assertSame($post, $output->getPost());
	}
}