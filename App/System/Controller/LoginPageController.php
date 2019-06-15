<?php

namespace App\System\Controller;

use App\Infrastructure\Presenter\Pages\LoginPagePresenter;
use App\Service\Usecase\PrepareLoginPage;
use Core\Controller\Controller;

class LoginPageController extends Controller {

	public function getLoginPage() {
		$usecase = new PrepareLoginPage();

		$output = $usecase->execute();

        $presenter = new LoginPagePresenter($output);

		$presenter->present();
	}
}