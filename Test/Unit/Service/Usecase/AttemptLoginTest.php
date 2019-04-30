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
		$output = \Mockery::mock(AttemptLoginOutput::class);
		Di::mockWithInput(AttemptLoginOutput::class, $output, true);

		$usecase = new AttemptLogin($input);
		$presenter = $usecase->execute();
		$this->assertSame($output, $presenter);
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
		$output = \Mockery::mock(AttemptLoginOutput::class);
		Di::mockWithInput(AttemptLoginOutput::class, $output, false);

		$usecase = new AttemptLogin($input);
		$presenter = $usecase->execute();
		$this->assertSame($output, $presenter);
	}
}