<?php

namespace App\Infrastructure\Presenter\Pages;

use App\Service\UsecaseOutput\PrepareLoginPageOutput;
use Core\Presenter\BasicUrlPresenter;
use Core\Presenter\BasicViewPresenter;
use Core\Presenter\UrlPresenter;
use Core\Presenter\ViewPresenter;

class LoginPagePresenter implements ViewPresenter, UrlPresenter {

	use BasicViewPresenter, BasicUrlPresenter;

	private $template = 'pages/login';
	private $redirectUrl = '/';

	private $info;

	public function __construct(PrepareLoginPageOutput $info) {
	    $this->info = $info;
    }

    public function isAlreadyLogin(): bool {
	    return $this->info->isAlreadyLogin();
    }

    public function attemptLoginUrl(): string {
		return '/login';
	}
}