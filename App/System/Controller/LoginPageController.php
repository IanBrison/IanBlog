<?php

namespace App\System\Controller;

use App\Infrastructure\Presenter\Pages\LoginPagePresenter;
use App\Service\Usecase\PrepareLoginPage;
use Core\Controller\Controller;
use Core\Di\DiContainer as Di;

class LoginPageController extends Controller {

	public function getLoginPage() {
		/** @var PrepareLoginPage $usecase */
		$usecase = Di::get(PrepareLoginPage::class);

		$output = $usecase->execute();

		if ($output->isAlreadyLogin()) {
			$this->redirect('/');
		}

		$presenter = Di::get(LoginPagePresenter::class);
		$this->view($presenter);
	}
}