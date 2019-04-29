<?php

namespace Test\Unit\Service\Usecase;

use App\Model\Read\Article;
use App\Service\Repository\Read\ArticleRepository;
use App\Service\Repository\Read\AuthRepository;
use App\Service\Usecase\PrepareAdminPage;
use App\Service\UsecaseInput\PrepareAdminPageInput;
use App\Service\UsecaseOutput\PrepareAdminPageOutput;
use Core\Di\DiContainer as Di;
use Test\TestCase;

class PrepareAdminPageTest extends TestCase {

	/**
	 * @test
	 */
	public function execute() {
		$input = \Mockery::mock(PrepareAdminPageInput::class);
		$authRepository = \Mockery::mock(AuthRepository::class);
		$authRepository->shouldReceive('isAuthenticated')->andReturn(true);
		Di::mock(AuthRepository::class, $authRepository);
		$article = \Mockery::mock(Article::class);
		$articles = [$article, $article, $article];
		$articleRepository = \Mockery::mock(ArticleRepository::class);
		$articleRepository->shouldReceive('getAll')->andReturn($articles);
		Di::mock(ArticleRepository::class, $articleRepository);
		$output = \Mockery::mock(PrepareAdminPageOutput::class);
		Di::mockWithInput(PrepareAdminPageOutput::class, $output, true, $articles);

		$usecase = new PrepareAdminPage($input);
		$presenter = $usecase->execute();
		$this->assertSame($output, $presenter);
	}

	/**
	 * @test
	 */
	public function executeWithNotAuthenticated() {
		$input = \Mockery::mock(PrepareAdminPageInput::class);
		$authRepository = \Mockery::mock(AuthRepository::class);
		$authRepository->shouldReceive('isAuthenticated')->andReturn(false);
		Di::mock(AuthRepository::class, $authRepository);
		$output = \Mockery::mock(PrepareAdminPageOutput::class);
		Di::mockWithInput(PrepareAdminPageOutput::class, $output, false);

		$usecase = new PrepareAdminPage($input);
		$presenter = $usecase->execute();
		$this->assertSame($output, $presenter);
	}
}