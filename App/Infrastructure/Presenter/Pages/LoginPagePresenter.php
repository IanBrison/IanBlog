<?php

namespace App\Infrastructure\Presenter\Pages;

use Core\Presenter\BasicViewPresenter;
use Core\Presenter\ViewPresenter;

class LoginPagePresenter implements ViewPresenter {

	use BasicViewPresenter;

	private $template = 'pages/login';
}