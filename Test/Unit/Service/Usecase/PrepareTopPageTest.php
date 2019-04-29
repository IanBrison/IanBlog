<?php

namespace Test\Unit\Service\Usecase;

use App\Service\Usecase\PrepareTopPage;
use App\Service\UsecaseInput\PrepareTopPageInput;
use App\Service\UsecaseOutput\PrepareTopPageOutput;
use Core\Di\DiContainer as Di;
use Test\TestCase;

class PrepareTopPageTest extends TestCase {

	/**
	 * @test
	 */
	public function execute() {
		$input = \Mockery::mock(PrepareTopPageInput::class);
		$output = \Mockery::mock(PrepareTopPageOutput::class);
		Di::mock(PrepareTopPageOutput::class, $output);

		$usecase = new PrepareTopPage($input);
		$presenter = $usecase->execute();
		$this->assertSame($output, $presenter);
	}
}