<?php

namespace App\System\Controller;

use App\Infrastructure\Presenter\Pages\LoginPagePresenter;
use App\Service\DiContainer as Di;
use App\Service\Usecase\PrepareLoginPage;
use Core\Controller\Controller;

class LoginPageController extends Controller {

	public function getLoginPage() {
	    /** @var PrepareLoginPage $usecase */
		$usecase = Di::get(PrepareLoginPage::class);

		$output = $usecase->execute();

        $presenter = new LoginPagePresenter($output);

		$presenter->present();
	}
}