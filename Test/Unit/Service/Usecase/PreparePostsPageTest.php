<?php

namespace Test\Unit\Service\Usecase;

use App\Model\Read\Post;
use App\Service\Repository\Read\PostRepository;
use App\Service\Usecase\PreparePostsPage;
use Core\Di\DiContainer as Di;
use Test\TestCase;

class PreparePostsPageTest extends TestCase {

	/**
	 * @test
	 */
	public function execute() {
		$post = \Mockery::mock(Post::class);
		$posts = [$post, $post, $post];
		$postRepository = \Mockery::mock(PostRepository::class);
		$postRepository->shouldReceive('getAll')->andReturn($posts);
		Di::mock(PostRepository::class, $postRepository);

		$usecase = new PreparePostsPage();
		$output = $usecase->execute();
		$this->assertSame($posts, $output->getPosts());
	}
}