<?php

namespace App\System\Controller;

use App\Infrastructure\InputConverter\AttemptLoginInput;
use App\Infrastructure\Presenter\Action\AttemptLoginPresenter;
use App\Service\DiContainer as Di;
use App\Service\Usecase\AttemptLogin;
use Core\Controller\Controller;
use Core\Di\DiContainer;
use Core\Request\Request;

class LoginAttemptController extends Controller {

	public function attemptLogin() {
		$request = DiContainer::get(Request::class);
		$input = new AttemptLoginInput($request);

		/** @var AttemptLogin $usecase */
		$usecase = Di::get(AttemptLogin::class, $input);

		$output = $usecase->execute();
		$presenter = new AttemptLoginPresenter($output);

		$presenter->present();
	}
}