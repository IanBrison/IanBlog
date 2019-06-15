<?php

namespace App\System\Controller;

use App\Infrastructure\InputConverter\AttemptLoginInput;
use App\Infrastructure\Presenter\Action\AttemptLoginPresenter;
use App\Service\Usecase\AttemptLogin;
use Core\Controller\Controller;
use Core\Di\DiContainer as Di;
use Core\Request\Request;

class LoginAttemptController extends Controller {

	public function attemptLogin() {
		$request = Di::get(Request::class);
		$input = new AttemptLoginInput($request);

		$usecase = new AttemptLogin($input);

		$output = $usecase->execute();
		$presenter = new AttemptLoginPresenter($output);

		$presenter->present();
	}
}