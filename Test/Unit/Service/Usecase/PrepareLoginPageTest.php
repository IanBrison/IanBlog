<?php

namespace Test\Unit\Service\Usecase;

use App\Service\Repository\Read\AuthRepository;
use App\Service\Usecase\PrepareLoginPage;
use App\Service\UsecaseInput\PrepareLoginPageInput;
use App\Service\UsecaseOutput\PrepareLoginPageOutput;
use Core\Di\DiContainer as Di;
use Test\TestCase;

class PrepareLoginPageTest extends TestCase {

	/**
	 * @test
	 */
	public function execute() {
		$input = \Mockery::mock(PrepareLoginPageInput::class);
		$authRepository = \Mockery::mock(AuthRepository::class);
		$authRepository->shouldReceive('isAuthenticated')->andReturn(false);
		Di::mock(AuthRepository::class, $authRepository);
		$output = \Mockery::mock(PrepareLoginPageOutput::class);
		Di::mockWithInput(PrepareLoginPageOutput::class, $output, false);

		$usecase = new PrepareLoginPage($input);
		$presenter = $usecase->execute();
		$this->assertSame($output, $presenter);
	}

	/**
	 * @test
	 */
	public function executeWithAuthenticated() {
		$input = \Mockery::mock(PrepareLoginPageInput::class);
		$authRepository = \Mockery::mock(AuthRepository::class);
		$authRepository->shouldReceive('isAuthenticated')->andReturn(true);
		Di::mock(AuthRepository::class, $authRepository);
		$output = \Mockery::mock(PrepareLoginPageOutput::class);
		Di::mockWithInput(PrepareLoginPageOutput::class, $output, true);

		$usecase = new PrepareLoginPage($input);
		$presenter = $usecase->execute();
		$this->assertSame($output, $presenter);
	}
}