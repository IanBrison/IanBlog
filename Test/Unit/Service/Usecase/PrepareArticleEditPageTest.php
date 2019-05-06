<?php

namespace Test\Unit\Service\Usecase;

use App\Model\Read\Article;
use App\Service\Repository\Read\ArticleRepository;
use App\Service\Repository\Read\AuthRepository;
use App\Service\Usecase\PrepareArticleEditPage;
use App\Service\UsecaseInput\PrepareArticleEditPageInput;
use Core\Di\DiContainer as Di;
use Test\TestCase;

class PrepareArticleEditPageTest extends TestCase {

	/**
	 * @test
	 */
	public function execute() {
		$articleId = 1;
		$input = \Mockery::mock(PrepareArticleEditPageInput::class);
		$input->shouldReceive('getArticleId')->andReturn($articleId);
		$authRepository = \Mockery::mock(AuthRepository::class);
		$authRepository->shouldReceive('isAuthenticated')->andReturn(true);
		Di::mock(AuthRepository::class, $authRepository);
		$article = \Mockery::mock(Article::class);
		$articleRepository = \Mockery::mock(ArticleRepository::class);
		$articleRepository->shouldReceive('getById')
			->with($articleId)
			->andReturn($article);
		Di::mock(ArticleRepository::class, $articleRepository);

		$usecase = new PrepareArticleEditPage($input);
		$output = $usecase->execute();
		$this->assertTrue($output->isAuthenticated());
		$this->assertSame($article, $output->getArticle());
	}

	/**
	 * @test
	 */
	public function executeWithNotAuthenticated() {
		$input = \Mockery::mock(PrepareArticleEditPageInput::class);
		$authRepository = \Mockery::mock(AuthRepository::class);
		$authRepository->shouldReceive('isAuthenticated')->andReturn(false);
		Di::mock(AuthRepository::class, $authRepository);

		$usecase = new PrepareArticleEditPage($input);
		$output = $usecase->execute();
		$this->assertFalse($output->isAuthenticated());
	}
}