<?php

namespace Test\Unit\Service\Usecase;

use App\Model\Read\Article;
use App\Service\Repository\Read\ArticleRepository;
use App\Service\Repository\Read\AuthRepository;
use App\Service\Usecase\Impls\PrepareAdminPageUsecase;
use App\Service\DiContainer as Di;
use Mockery;
use Test\TestCase;

class PrepareAdminPageTest extends TestCase {

	/**
	 * @test
	 */
	public function execute() {
		$authRepository = Mockery::mock(AuthRepository::class);
		$authRepository->shouldReceive('isAuthenticated')->andReturn(true);
		Di::mock(AuthRepository::class, $authRepository);
		$article = Mockery::mock(Article::class);
		$articles = [$article, $article, $article];
		$articleRepository = Mockery::mock(ArticleRepository::class);
		$articleRepository->shouldReceive('getAll')->andReturn($articles);
		Di::mock(ArticleRepository::class, $articleRepository);

		$usecase = new PrepareAdminPageUsecase();
		$output = $usecase->execute();
		$this->assertTrue($output->isAuthenticated());
		$this->assertSame($articles, $output->getArticles());
	}

	/**
	 * @test
	 */
	public function executeWithNotAuthenticated() {
		$authRepository = Mockery::mock(AuthRepository::class);
		$authRepository->shouldReceive('isAuthenticated')->andReturn(false);
		Di::mock(AuthRepository::class, $authRepository);

		$usecase = new PrepareAdminPageUsecase();
		$output = $usecase->execute();
		$this->assertFalse($output->isAuthenticated());
	}
}