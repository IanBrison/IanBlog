<?php

namespace Test\Unit\Service\Usecase;

use App\Model\Read\Image;
use App\Service\Repository\Read\AuthRepository;
use App\Service\Repository\Read\ImageRepository;
use App\Service\Usecase\PrepareImagesPage;
use App\Service\UsecaseOutput\PrepareImagesPageOutput;
use Core\Di\DiContainer as Di;
use Test\TestCase;

class PrepareImagesPageTest extends TestCase {

	/**
	 * @test
	 */
	public function execute() {
		$authRepository = \Mockery::mock(AuthRepository::class);
		$authRepository->shouldReceive('isAuthenticated')->andReturn(true);
		Di::mock(AuthRepository::class, $authRepository);
		$image = \Mockery::mock(Image::class);
		$images = [$image, $image, $image];
		$imageRepository = \Mockery::mock(ImageRepository::class);
		$imageRepository->shouldReceive('getAll')->andReturn($images);
		Di::mock(ImageRepository::class, $imageRepository);
		$output = \Mockery::mock(PrepareImagesPageOutput::class);
		Di::mockWithInput(PrepareImagesPageOutput::class, $output, true, $images);

		$usecase = new PrepareImagesPage();
		$presenter = $usecase->execute();
		$this->assertSame($output, $presenter);
	}

	/**
	 * @test
	 */
	public function executeWithNotAuthenticated() {
		$authRepository = \Mockery::mock(AuthRepository::class);
		$authRepository->shouldReceive('isAuthenticated')->andReturn(false);
		Di::mock(AuthRepository::class, $authRepository);
		$output = \Mockery::mock(PrepareImagesPageOutput::class);
		Di::mockWithInput(PrepareImagesPageOutput::class, $output, false);

		$usecase = new PrepareImagesPage();
		$presenter = $usecase->execute();
		$this->assertSame($output, $presenter);
	}
}