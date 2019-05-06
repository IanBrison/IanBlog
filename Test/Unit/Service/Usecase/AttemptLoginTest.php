<?php

namespace Test\Unit\Service\Usecase;

use App\Service\Repository\Read\AuthRepository;
use App\Service\Usecase\AttemptLogin;
use App\Service\UsecaseInput\AttemptLoginInput;
use App\Service\UsecaseOutput\AttemptLoginOutput;
use Core\Di\DiContainer as Di;
use Test\TestCase;

class AttemptLoginTest extends TestCase {

	/**
	 * @test
	 */
	public function execute() {
		$password = 'password';
		$input = \Mockery::mock(AttemptLoginInput::class);
		$input->shouldReceive('getPassword')->andReturn($password);
		$authRepository = \Mockery::mock(AuthRepository::class);
		$authRepository->shouldReceive('attemptLogin')
			->with($password)
			->andReturn(true);
		Di::mock(AuthRepository::class, $authRepository);

		$usecase = new AttemptLogin($input);
		$output = $usecase->execute();
		$this->assertTrue($output->isNowLogin());
	}

	/**
	 * @test
	 */
	public function executeWithWrongPassword() {
		$password = 'password';
		$input = \Mockery::mock(AttemptLoginInput::class);
		$input->shouldReceive('getPassword')->andReturn($password);
		$authRepository = \Mockery::mock(AuthRepository::class);
		$authRepository->shouldReceive('attemptLogin')
			->with($password)
			->andReturn(false);
		Di::mock(AuthRepository::class, $authRepository);

		$usecase = new AttemptLogin($input);
		$output = $usecase->execute();
		$this->assertFalse($output->isNowLogin());
	}
}