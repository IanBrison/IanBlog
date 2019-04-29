<?php

namespace Test\Unit\Service\Usecase;

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
		Di::set(AuthRepository::class, $authRepository);
		$articleRepository = \Mockery::mock(ArticleRepository::class);
		$articleRepository->shouldReceive('getAll')->andReturn([]);
		Di::set(ArticleRepository::class, $articleRepository);
		$output = \Mockery::mock(PrepareAdminPageOutput::class);
		Di::set(PrepareAdminPageOutput::class, $output);

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
		Di::set(AuthRepository::class, $authRepository);
		$output = \Mockery::mock(PrepareAdminPageOutput::class);
		Di::set(PrepareAdminPageOutput::class, $output);

		$usecase = new PrepareAdminPage($input);
		$presenter = $usecase->execute();
		$this->assertSame($output, $presenter);
	}
}