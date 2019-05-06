<?php

namespace Test\Unit\Service\Usecase;

use App\Service\Repository\Read\AuthRepository;
use App\Service\Usecase\PrepareLoginPage;
use Core\Di\DiContainer as Di;
use Test\TestCase;

class PrepareLoginPageTest extends TestCase {

	/**
	 * @test
	 */
	public function execute() {
		$authRepository = \Mockery::mock(AuthRepository::class);
		$authRepository->shouldReceive('isAuthenticated')->andReturn(false);
		Di::mock(AuthRepository::class, $authRepository);

		$usecase = new PrepareLoginPage();
		$output = $usecase->execute();
		$this->assertFalse($output->isAlreadyLogin());
	}

	/**
	 * @test
	 */
	public function executeWithAuthenticated() {
		$authRepository = \Mockery::mock(AuthRepository::class);
		$authRepository->shouldReceive('isAuthenticated')->andReturn(true);
		Di::mock(AuthRepository::class, $authRepository);

		$usecase = new PrepareLoginPage();
		$output = $usecase->execute();
		$this->assertTrue($output->isAlreadyLogin());
	}
}